import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, FormControl, Validators} from '@angular/forms';
import { AngularWaitBarrier } from 'blocking-proxy/built/lib/angular_wait_barrier';
import { AuthService } from 'src/app/auth.service';
import { HttpClient } from '@angular/common/http';
import { HttpClientModule} from '@angular/common/http';
import { getDefaultService } from 'selenium-webdriver/chrome';

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


      
  
  
 

  constructor(private service: AuthService ,private formBuilder: FormBuilder, private Http: HttpClient) {

  }

  onSubmit(AuthService) {
    
    console.log("yes");
    console.log(this.registerForm.value)
     
 
    
    this.submitted =true;
    if (this.registerForm.invalid){
      return;
    }
    
    this.success = true;
    route: './home'
    let posts = this.Http.post('http://localhost:3000/addusers',this.registerForm.value );
    posts.subscribe((response) => {
      this.response = response;
      //AuthService.getUser('test');
      console.log(this.response)
    });

  }

  ngOnInit() {
    this.registerForm = this.formBuilder.group({
      fName: ['', Validators.required],
      lName: ['', Validators.required],
      username: ['', Validators.required],
      email: ['', Validators.required],
      password: ['', Validators.required]
    })
  }

}
