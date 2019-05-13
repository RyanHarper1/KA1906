import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { HttpClientModule } from '@angular/common/http';
import { AuthService } from 'src/app/auth.service';
import { Router } from '@angular/router';
import { EditScriptComponent } from '../edit-script/edit-script.component';
import { EditServiceService } from 'src/app/edit-service.service';

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
  columns = ['scriptName','category'];
  username: String;
  loggedIn = false;
  constructor(private Http: HttpClient, private Auth: AuthService, private router: Router, private editService: EditServiceService) { }

  ngOnInit() {
    this.saved = true;
    this.uploaded = false;
    this.purchased = false;
    this.loggedIn = this.Auth.loggedIn
    if (this.loggedIn){
      let current = this.Http.post('http://localhost:3000/current-scripts', {id: this.Auth.getId});
      current.subscribe((response) => {

        this.list=response;
        console.log(response)
      });
    }

  }
  showSaved(){
    this.saved = true;
    this.uploaded = false;
    this.purchased = false;
  }
  showUploaded(){
    this.saved = false;
    this.uploaded = true;
    this.purchased = false;
  }
  showPurchased(){
    this.saved = false;
    this.uploaded = false;
    this.purchased = true;
  }
  editScript(script){
    this.editService.setScript(script.scriptId);
    console.log(script);
    this.router.navigate(['edit-script']);

  }

  deleteScript(script){
    let del = this.Http.post('http://localhost:3000/delete-script', {scriptId: script.scriptId});
    del.subscribe((response) => {

      this.list=response;
      console.log(response)
      this.router.navigate(['/current-script']);
    });
    console.log(script);
  }


}
