import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, FormControl, Validators } from '@angular/forms';
import { AngularWaitBarrier } from 'blocking-proxy/built/lib/angular_wait_barrier';
import { AuthService } from 'src/app/auth.service';
import { HttpClient } from '@angular/common/http';
import { HttpClientModule } from '@angular/common/http';
import { getDefaultService } from 'selenium-webdriver/chrome';
import { FormsModule } from '@angular/forms';
import { Router } from '@angular/router';
import { EditServiceService } from 'src/app/edit-service.service';

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
  saved = false;
  private answers: string[] = [];
  questionId: any;
  loggedIn = false;
  //questionForm: FormGroup;

  constructor(private Auth: AuthService, private formBuilder: FormBuilder, private Http: HttpClient, private router: Router,private editService: EditServiceService) { }

  onSubmit(AuthService) {

    console.log("yes");
    console.log(this.scriptForm.value)
    //console.log(this.questionForm.value)
    for (let i = 0; i < this.answers.length; i++) {
      console.log(this.answers[i]);

    }
    this.submitted = true;
    if (this.scriptForm.invalid) {
      return;
    }
    if (this.scriptId == null) {
      console.log(this.texts);

      this.Auth.sendScript(this.scriptForm, this.texts, this.answers);
   
    }

    this.success = true;
    this.saved = true;
    

  }

  ngOnInit() {
    this.loggedIn = this.Auth.loggedIn;
    this.questionId = '';
    this.usersId = this.Auth.getId;
    this.scriptForm = this.formBuilder.group({
      usersId: [this.usersId, Validators.required],
      category: ['', Validators.required],
      scriptName: ['', Validators.required]
    })

  }
  addAnswer() {
    if (this.answer >= 9) {
      alert('Maximum count reached');
    } else {
      this.answer++;
    }

  }
  removeAnswer() {
    if (this.answer <= 1) {
      alert('Maximum count reached');
    } else {
      this.answers[this.answer - 1] = '';
      this.answer--;
    }

  }
  nextQuestion(selectedAnswer,num) {
    this.answer = 1;
    this.texts = '';
    let tempAnswer = selectedAnswer;
    for (let i = 0; i < this.answers.length; i++){
      this.answers[i] = null;

    }
    //console.log('questionId: '+ this.questionId);

  }

  
}
