export class EmployeeReducer {
}
import { createReducer, on } from "@ngrx/store";
import { Employee } from './employee';
import { employeeFetchAPISuccess } from './employee.action';

export const initialState: ReadonlyArray<Employee> = [];

export const employeeReducer = createReducer(
  initialState,
  on(employeeFetchAPISuccess, (state, { allEmployees }) => {
    return allEmployees;
  })
);
