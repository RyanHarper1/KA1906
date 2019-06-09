import { Component, OnInit } from '@angular/core';
import { AuthService } from 'src/app/auth.service';
import {FormControl, Validators, FormGroup, FormBuilder} from '@angular/forms';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-update-details',
  templateUrl: './update-details.component.html',
  styleUrls: ['./update-details.component.scss']
})

export class UpdateDetailsComponent implements OnInit {
  email = new FormControl (this.Auth.email, [Validators.required,Validators.email])
  curPass = new FormControl ('', [Validators.required])
  newPass = new FormControl ('', [Validators.required])
  confirmPass = new FormControl ('', [Validators.required])
submitted = false;
errormessage: any;
 
  constructor(private Auth:AuthService,private formBuilder: FormBuilder,private Http: HttpClient) { }

  ngOnInit() {
   


  }
  getErrorMessage() {
    return this.email.hasError('required') ? 'You must enter a value' :
        this.email.hasError('email') ? 'Not a valid email' :
            '';
  }
  submit(){
    if( this.email.valid && this.curPass.valid && this.newPass.valid && this.confirmPass.valid ){
      alert('valid')
      this.submitted = true;
      let post = this.Http.post<any>('http://localhost:3000/updateDetails',{id: this.Auth.id, email: this.email.value, password: this.curPass.value, newPass: this.confirmPass.value})
      post.subscribe((response) => {
        this.errormessage = response.result
      })
    }
  }
  getErrorMessage1() {
    return this.errormessage
  }

}
