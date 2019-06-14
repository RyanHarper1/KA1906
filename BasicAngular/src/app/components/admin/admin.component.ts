import { Component, OnInit } from '@angular/core';
import { AuthService } from 'src/app/auth.service';
import { HttpClient } from '@angular/common/http';
import { MatIconRegistry, MatDialogRef, MatDialog } from '@angular/material';
import { DomSanitizer } from '@angular/platform-browser';
import { MatGridListModule } from '@angular/material/grid-list';

@Component({
  selector: 'app-admin',
  templateUrl: './admin.component.html',
  styleUrls: ['./admin.component.scss']
})
export class AdminComponent implements OnInit {
  list: any;
  fName: any;
  lName: any;
  email: any;
  password: any;
  userType:any;
  constructor(public dialog: MatDialog, sanitizer: DomSanitizer, iconRegistry: MatIconRegistry, private Auth: AuthService, private Http: HttpClient) {

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

    let query = this.Http.post('http://salesscript.com.au/sql/orgUsers', { id: this.Auth.id });
    query.subscribe((response) => {
      this.list = response
    })



  }
  addUser() {
    if (this.fName == null || this.lName == null || this.email == null || this.password == null || this.userType == null) {
      alert('Please enter all required information')
    } else {
      if(this.userType == 1){
        let newUser = this.Http.post('http://salesscript.com.au/sql/newOrgUser', { fName: this.fName, lName: this.lName, email: this.email, password: this.password ,orgId: this.Auth.orgId, admin:'U'})
        newUser.subscribe(res => {
          this.ngOnInit();
        })
      

      }else{
        let newUser = this.Http.post('http://salesscript.com.au/sql/newOrgUser', { fName: this.fName, lName: this.lName, email: this.email, password: this.password ,orgId: this.Auth.orgId,admin:'A'})
        newUser.subscribe(res => {
          this.ngOnInit();
        })
      }
    }
  }
  editUser(user){
    if(user.admin == 'A'){
      let newUser = this.Http.post('http://salesscript.com.au/sql/updateOrgUser', { id:user.id, admin: 'U'})
      newUser.subscribe(res => {
        this.ngOnInit();
      })
    }else{
      let newUser = this.Http.post('http://salesscript.com.au/sql/updateOrgUser', { id:user.id, admin: 'A'})
        newUser.subscribe(res => {
          this.ngOnInit();
        })
    }
  }



deleteUser(user){
  const dialogRef = this.dialog.open(confirmDelete, {
    width: '700px'
  });

  dialogRef.afterClosed().subscribe(result => {
    if (result == 'yes') {
      let del = this.Http.post('http://salesscript.com.au/sql/deleteOrgUser', { id: user.id })
      del.subscribe(res => {
        this.ngOnInit();
      })
    }


  });
}
    

}

@Component({
  selector: 'confirmDelete',
  templateUrl: 'confirmDelete.html',
})
export class confirmDelete {




  constructor(public dialogRef: MatDialogRef<confirmDelete>) {
    dialogRef.disableClose = true;
  }




  closeDialog(answer) {

    this.dialogRef.close(answer);

  }




}