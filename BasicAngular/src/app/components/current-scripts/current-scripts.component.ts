import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { HttpClientModule } from '@angular/common/http';
import { AuthService } from 'src/app/auth.service';
import { Router } from '@angular/router';
import { EditScriptComponent } from '../edit-script/edit-script.component';
import { EditServiceService } from 'src/app/edit-service.service';
import { MatIconRegistry } from '@angular/material';
import { DomSanitizer } from '@angular/platform-browser';
import { ViewScriptService } from 'src/app/view-script.service';


@Component({
  selector: 'app-current-scripts',
  templateUrl: './current-scripts.component.html',
  styleUrls: ['./current-scripts.component.scss']
})
export class CurrentScriptsComponent implements OnInit {
  saved: boolean;
  uploaded: boolean;
  purchased: boolean;
  list: any;
  storelist: any;
  columns = ['scriptName', 'category'];
  username: String;
  loggedIn = false;
  constructor(sanitizer: DomSanitizer, iconRegistry: MatIconRegistry, private Http: HttpClient, private Auth: AuthService, private router: Router, private editService: EditServiceService, private viewService: ViewScriptService) {

    iconRegistry.addSvgIcon(
      'upload',
      sanitizer.bypassSecurityTrustResourceUrl('../assets/upload-solid.svg'));
    iconRegistry.addSvgIcon(
      'edit',
      sanitizer.bypassSecurityTrustResourceUrl('../assets/edit-regular.svg'));
    iconRegistry.addSvgIcon(
      'delete',
      sanitizer.bypassSecurityTrustResourceUrl('../assets/times-solid.svg'));
      




  }

  ngOnInit() {
    this.saved = true;
    this.uploaded = false;
    this.purchased = false;
    this.loggedIn = this.Auth.loggedIn
    if (this.loggedIn) {
      let current = this.Http.post('http://localhost:3000/current-scripts', { id: this.Auth.getId });
      current.subscribe((response) => {
        this.list = response;
        console.log(response)
      });
      let store = this.Http.post('http://localhost:3000/uploaded', { id: this.Auth.getId });
      store.subscribe((response) => {

        this.storelist = response;
        console.log(response)
      });
    }


  }
  showSaved() {
    this.saved = true;
    this.uploaded = false;
    this.purchased = false;
  }
  showUploaded() {
    this.saved = false;
    this.uploaded = true;
    this.purchased = false;
  }
  showPurchased() {
    this.saved = false;
    this.uploaded = false;
    this.purchased = true;
  }
  editScript(script) {
    this.editService.setScript(script.scriptId);
    console.log(script);
    this.router.navigate(['edit-script']);

  }
  deleteScript(script) {
    let del = this.Http.post('http://localhost:3000/delete-script', { scriptId: script.scriptId });
    del.subscribe((response) => {

      this.ngOnInit()
    });
    console.log(script);


  }
  uploadScript(script) {
    console.log('first question' + script.firstQuestionId)
    // let dateFormat = require('dateformat');
    let now = new Date();
    // let date = String(dateFormat(now, "dd/mm/yyyy"));
    let upload = this.Http.post('http://localhost:3000/upload-script', { usersID: this.Auth.id, scriptID: script.scriptId, /*uploadDate: date ,*/scriptName: script.scriptName, price: 5, category: script.category, question: Number(script.firstQuestionId), description: script.description });
    upload.subscribe((response) => {
      console.log(response)
      this.ngOnInit();
    });


  }
  viewScript(script){
    this.viewService.setScript(script.scriptId);
    console.log(script);
    this.router.navigate(['view-script']);
  }


}
