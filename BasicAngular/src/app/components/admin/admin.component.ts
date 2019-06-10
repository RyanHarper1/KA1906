import { Component, OnInit } from '@angular/core';
import { AuthService } from 'src/app/auth.service';
import { HttpClient } from '@angular/common/http';
import { MatIconRegistry } from '@angular/material';
import { DomSanitizer } from '@angular/platform-browser';

@Component({
  selector: 'app-admin',
  templateUrl: './admin.component.html',
  styleUrls: ['./admin.component.scss']
})
export class AdminComponent implements OnInit {
  list:any;
  constructor( sanitizer: DomSanitizer, iconRegistry: MatIconRegistry,private Auth: AuthService, private Http: HttpClient) {

    iconRegistry.addSvgIcon(
      'add',
      sanitizer.bypassSecurityTrustResourceUrl('../assets/img/plus-circle-solid.svg'));
    iconRegistry.addSvgIcon(
      'edit',
      sanitizer.bypassSecurityTrustResourceUrl('../assets/img/pen-solid.svg'));
    iconRegistry.addSvgIcon(
      'delete',
      sanitizer.bypassSecurityTrustResourceUrl('../assets/img/red-cross.svg'));


   }

  ngOnInit() {

    let query = this.Http.post('http://localhost:3000/orgUsers', {id: this.Auth.id});
    query.subscribe((response) => {
      this.list= response
    })
  
    console.log('list is='+ this.list)

    
  }
 
    

}