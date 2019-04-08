import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, FormControl, Validators } from '@angular/forms';
import { AngularWaitBarrier } from 'blocking-proxy/built/lib/angular_wait_barrier';
import { AuthService } from 'src/app/auth.service';
import { HttpClient } from '@angular/common/http';
import { HttpClientModule } from '@angular/common/http';
import { getDefaultService } from 'selenium-webdriver/chrome';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-build-script',
  templateUrl: './build-script.component.html',
  styleUrls: ['./build-script.component.scss']
})
export class BuildScriptComponent implements OnInit {

  readonly URL = 'localhost::3000/test'
  posts: any;
  submitted = false;
  success = false;
  response: Object;
  scriptForm: FormGroup;
  scriptId: any;
  usersId: any;
  texts: any;
  answer = 1;
  //questionForm: FormGroup;

  constructor(private Auth: AuthService, private formBuilder: FormBuilder, private Http: HttpClient) { }

  onSubmit(AuthService) {

    console.log("yes");
    console.log(this.scriptForm.value)
    //console.log(this.questionForm.value)

      this.submitted = true;
    if (this.scriptForm.invalid) {
      return;
    }
    if(this.scriptId == null){
      console.log(this.texts);
      
      this.scriptId = this.Auth.sendScript(this.scriptForm,this.texts);

    }
    
    console.log('testarooni' + this.texts);
    this.success = true;
  }

  ngOnInit() {
    this.usersId=this.Auth.getId;
    this.scriptForm = this.formBuilder.group({
      usersId: [this.usersId, Validators.required],
      category: ['', Validators.required],
      scriptName: ['', Validators.required]
    })

  }
  addAnswer(){
    if (this.answer >= 9){
      alert('Maximum count reached');
    }else{
      this.answer++;
    }
    
  }
  removeAnswer(){
    if (this.answer < 1){
      alert('Maximum count reached');
    }else{
      this.answer--;
    }

}
}
