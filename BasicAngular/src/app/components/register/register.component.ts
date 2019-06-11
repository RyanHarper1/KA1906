import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, FormControl, Validators } from '@angular/forms';
import { AngularWaitBarrier } from 'blocking-proxy/built/lib/angular_wait_barrier';
import { AuthService } from 'src/app/auth.service';
import { HttpClient } from '@angular/common/http';
import { HttpClientModule } from '@angular/common/http';
import { getDefaultService } from 'selenium-webdriver/chrome';
import { Router } from '@angular/router';
import { privacy } from '../login/login.component';
import { terms } from '../footer/footer.component';
import { MatDialog } from '@angular/material';

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.scss']
})


export class RegisterComponent implements OnInit {

  readonly URL = 'localhost::3000/test'
  posts: any;
  submitted = false;
  success = false;
  response: Object;
  registerForm: FormGroup;
  password: any;

  //  dialog: any;

  constructor(public dialog: MatDialog,private router: Router,public Auth: AuthService, private formBuilder: FormBuilder, private Http: HttpClient) {

  }

  onSubmit() {

    if (this.registerForm.value.password != this.registerForm.value.confirmPass) {
      alert('Passwords do not match')
    } else {


    

      this.submitted = true;
      if (this.registerForm.invalid) {
       return;
      } else {

        this.Auth.register(this.registerForm);
        this.success = true;
        this.router.navigate(['login']);
      }
    }
  }

  ngOnInit() {
    this.registerForm = this.formBuilder.group({
      fName: ['', Validators.required],
      lName: ['', Validators.required],
      //username: ['', Validators.required],
      email: ['', Validators.required],
      password: ['', Validators.required],
      confirmPass: ['', Validators.required]
    })
  }
  openPrivacy() {
    const dialogRef1 = this.dialog.open(privacy, {
      width: '700px'
    });
  }
  openTerms() {
    const dialogRef = this.dialog.open(terms, {
      width: '700px'
    });
  }

}
