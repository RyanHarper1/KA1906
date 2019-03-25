import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {

  logInForm: FormGroup;
  submitted = false;
  success = false;

  constructor(private formBuilder: FormBuilder) { }

  ngOnInit() {
    this.logInForm = this.formBuilder.group({

      username: ['', Validators.required],
      password: ['',Validators.required]

    });
  }

  onSubmit() {
   this.submitted = true;

   if (this.logInForm.invalid) {
       return;
   }

   this.success = true;
 }
}

  /*loginUser(event){
    event.preventDefault()
    const target = event.target,
    const username = target.querySelector('#username').value,
    const password = target.querySelector('#password').value,
    console.log(username,password);
  };*/
