import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { HttpClient } from '@angular/common/http';
import { HttpClientModule} from '@angular/common/http';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {

  logInForm: FormGroup;
  submitted = false;
  success = false;
  response: Object;

  constructor(private formBuilder: FormBuilder,  private Http: HttpClient) { }

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

   this.success = true;
   let posts = this.Http.post('http://localhost:3000/login',this.logInForm.value );
   posts.subscribe((response) => {
     this.response = response;
     //AuthService.getUser('test');
     console.log(this.response)
   });
 }
}

  /*loginUser(event){
    event.preventDefault()
    const target = event.target,
    const username = target.querySelector('#username').value,
    const password = target.querySelector('#password').value,
    console.log(username,password);
  };*/
