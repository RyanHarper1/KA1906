import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { HttpClient } from '@angular/common/http';
import { HttpClientModule} from '@angular/common/http';
import { AuthService } from 'src/app/auth.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {

  logInForm: FormGroup;
  submitted = false;
  success = false;
 

  constructor(private formBuilder: FormBuilder,  private Auth: AuthService) { }

  ngOnInit() {
    this.logInForm = this.formBuilder.group({

      username: ['', Validators.required],
      password: ['',Validators.required]

    });
  }

  onSubmit(event) {
   this.submitted = true;

   if (this.logInForm.invalid) {
       return;
   }

   this.success = true;
   //console.log();
  this.Auth.login(this.logInForm.value.username,this.logInForm.value.password);
  
 }
}

  /*loginUser(event){
    event.preventDefault()
    const target = event.target,
    const username = target.querySelector('#username').value,
    const password = target.querySelector('#password').value,
    console.log(username,password);
  };*/
