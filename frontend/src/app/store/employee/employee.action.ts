import { createAction, props } from '@ngrx/store';
import { Employee } from './employee';

export const invokeEmployeesAPI = createAction(
  '[Employees API] Invoke Employees Fetch API'
);

export const employeeFetchAPISuccess = createAction(
  '[Employees API] Fetch API Success',
  props<{ allEmployees: Employee[] }>()
);
