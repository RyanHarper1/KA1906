import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators} from '@angular/forms';
import { AngularWaitBarrier } from 'blocking-proxy/built/lib/angular_wait_barrier';
import { AuthService } from 'src/app/auth.service';

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.scss']
})


export class RegisterComponent implements OnInit {

  readonly URL = 'localhost::3000/test'
  posts: any;
  registerForm: FormGroup;
  submitted = false;
  success = false;

  constructor(private service: AuthService ,private formBuilder: FormBuilder) {
    this.registerForm = this.formBuilder.group({
      fName: ['', Validators.required],
      lName: ['', Validators.required],
      username: ['', Validators.required],
      email: ['', Validators.required],
      password: ['', Validators.required]
    })
  }

  onSubmit(http, AuthService){
    
    console.log("yes");
    this.submitted =true;
    if (this.registerForm.invalid){
      return;
    }
    this.success = true;

    this.posts = AuthService.getUserDetails();
  }

  ngOnInit() {
  
  }

}
