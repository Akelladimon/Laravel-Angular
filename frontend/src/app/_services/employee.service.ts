import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import {Employee} from "../store/employee/employee";

const EMPLOYEE_API = 'http://localhost:8000/api/employee/';
@Injectable({
  providedIn: 'root'
})
export class EmployeeService {

  constructor(private http: HttpClient) { }

  get() {
    return this.http.get<Employee[]>(EMPLOYEE_API);
  }
}
