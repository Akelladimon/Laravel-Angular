import { Component, OnInit } from '@angular/core';
import { UserService } from '../_services/user.service';
import {StorageService} from "../_services/storage.service";
import {CompanyService} from "../_services/company.service";
import { select, Store } from '@ngrx/store';
import { selectEmployees } from '../store/employee/employee.selector';
import {invokeEmployeesAPI} from "../store/employee/employee.action";

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit {
  content?: string;
  needCompany = false;
  isLoggedIn = false;
  isLoginFailed = false;
  errorMessage = '';
  roles: string[] = [];

  form: any = {
    owner_id: null,
    name: null,
    city: null,
    state: null,
    address: null,
    zip: null,
    phone: null
  };
  constructor(private companyService: CompanyService,  private storageService: StorageService, private store: Store) { }
  employees$ = this.store.pipe(select(selectEmployees));
  ngOnInit(): void {
    let user = this.storageService.getUser()?.user;
    if (this.storageService.isLoggedIn()) {
      this.isLoggedIn = true;
      this.roles = this.storageService.getUser().roles;
    }
    console.log(55);
    console.log(this.storageService.getUser());
    if (user) {
      this.companyService.getUserCompany(user?.id).subscribe({
        next: data => {
          this.needCompany = !data.data.length
          console.log('3333');
          console.log(data);
          this.content = 'ddd';
        },
        error: err => {console.log(err)
          if (err.error) {
            this.content = JSON.parse(err.error).message;
          } else {
            this.content = "Error with status: " + err.status;
          }
        }
      });
    }
    this.store.dispatch(invokeEmployeesAPI());
  }

  onSubmitCompany(): void {
    this.form.owner_id = this.storageService.getUser()?.user.id
    this.companyService.createCompany(this.form).subscribe({
      next: data => {
        console.log('createCompany');
        console.log(data);
      },
      error: err => {
        this.errorMessage = err.error.message;
      }
    });
  }
}
