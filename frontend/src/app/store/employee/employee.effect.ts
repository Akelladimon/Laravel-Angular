import { Injectable } from "@angular/core";
import { Actions, createEffect, ofType } from '@ngrx/effects';
import { select, Store } from '@ngrx/store';
import { EMPTY, map, mergeMap, withLatestFrom } from 'rxjs';
import { employeeFetchAPISuccess, invokeEmployeesAPI } from './employee.action';
import { EmployeeService } from "../../_services/employee.service";
import { selectEmployees } from "./employee.selector";


@Injectable()
export class EmployeeEffect {
  constructor(
    private actions$: Actions,
    private employeeService: EmployeeService,
    private store: Store
  ) {}

  loadAllEmployees$ = createEffect(() =>
    this.actions$.pipe(
      ofType(invokeEmployeesAPI),
      withLatestFrom(this.store.pipe(select(selectEmployees))),
      mergeMap(([, employeeformStore]) => {
        if (employeeformStore.length > 0) {
          return EMPTY;
        }
        return this.employeeService
          .get()
          .pipe(map((data) => employeeFetchAPISuccess({ allEmployees: data })));
      })
    )
  );
}
