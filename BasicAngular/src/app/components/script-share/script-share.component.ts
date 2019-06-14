import { Component, OnInit } from '@angular/core';
import { AuthService } from 'src/app/auth.service';
import { HttpClient } from '@angular/common/http';
import { listLazyRoutes } from '@angular/compiler/src/aot/lazy_routes';
import { ViewScriptService } from 'src/app/view-script.service';
import { Router } from '@angular/router';
import { MatSnackBar, MatDialog } from '@angular/material';
import { confirmDelete } from '../admin/admin.component';
import { MatIconRegistry } from '@angular/material';
import { DomSanitizer } from '@angular/platform-browser';

@Component({
  selector: 'app-script-share',
  templateUrl: './script-share.component.html',
  styleUrls: ['./script-share.component.scss']
})
export class ScriptShareComponent implements OnInit {
  logged = false;
  orgId = "";
  list: any;
  list2: any;
  constructor(public dialog: MatDialog,private snackBar: MatSnackBar,private viewService: ViewScriptService,private router: Router,private auth: AuthService, private Http: HttpClient, sanitizer: DomSanitizer, iconRegistry: MatIconRegistry) {
    iconRegistry.addSvgIcon(
      'view',
      sanitizer.bypassSecurityTrustResourceUrl('../assets/img/eye-regular.svg'));
      iconRegistry.addSvgIcon(
        'delete',
        sanitizer.bypassSecurityTrustResourceUrl('../assets/img/red-cross.svg'));
   }

  ngOnInit() {
    this.list = {}
    this.list2 =[]
    this.logged = this.auth.loggedIn;
    this.orgId = this.auth.orgId;
    if (this.logged){
      let scripts = this.Http.post('http://salesscript.com.au/sql/get-orgscripts', {orgId: this.auth.orgId});
      scripts.subscribe((response) => {
        this.list = response;
        for (let i = 0; i < this.list.length;i++){
          let get = this.Http.post('http://salesscript.com.au/sql/get-script', {scriptId: this.list[i].scriptId});
          get.subscribe((response1) => {
            if(response1[0].scriptId != null){
              this.list2[i] = response1[0];
            }
            
          
        });
      }
      });
  

      
    }

  }
  viewScript(script) {
    this.viewService.setScript(script.scriptId);
    this.router.navigate(['view-script']);
  }
  deleteScript(script){
    const dialogRef = this.dialog.open(confirmDelete, {
      width: '700px'
    });

    dialogRef.afterClosed().subscribe(result => {
      if (result == 'yes') {
    let del = this.Http.post('http://http://salesscript.com.au/sql/deleteOrgScript',{scriptId:script.scriptId})
    del.subscribe((result) => {
      let snackBarRef = this.snackBar.open('Successfully Deleted');
      this.ngOnInit()
    })
  }
  })

  }
  subscribe(){
    this.router.navigate(['subscribe']);
  }

}
