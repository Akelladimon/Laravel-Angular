import { Injectable } from '@angular/core';
import {Observable} from "rxjs";
import {HttpClient} from "@angular/common/http";

const API_URL = 'http://localhost:8000/api/';
@Injectable({
  providedIn: 'root'
})
export class CompanyService {

  constructor(private http: HttpClient) { }

  getUserCompany(userId: number): Observable<any> {
    return this.http.get(API_URL + 'company/' + userId + '/user', { responseType: 'json' });
  }
  createCompany(payload: Object): Observable<any> {
    return this.http.post(API_URL + 'company',{...payload}, { responseType: 'json' });
  }
}
