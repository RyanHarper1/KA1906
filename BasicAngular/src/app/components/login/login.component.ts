import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { HttpClient } from '@angular/common/http';
import { HttpClientModule} from '@angular/common/http';
import { AuthService } from 'src/app/auth.service';
import { Router } from '@angular/router';
import { MatDialogRef, MatDialog } from '@angular/material';
import { terms } from '../footer/footer.component';


@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {

  logInForm: FormGroup;
  submitted = false;
  success = false;
  result: any;


  constructor(private formBuilder: FormBuilder,  private Auth: AuthService, private router: Router, public dialog: MatDialog) { }

  ngOnInit() {
    this.logInForm = this.formBuilder.group({

      email: ['', Validators.required],
      password: ['',Validators.required]

    });
  }

  onSubmit() {
   this.submitted = true;

   if (this.logInForm.invalid) {
       return;
   }

   this.success = true;
   //console.log();
   this.Auth.login(this.logInForm.value.email,this.logInForm.value.password).subscribe(data => {
    console.log('result is: ' + data.result);
    this.result = data.message;
    if ( data.result == 'true'){
      this.Auth.userDetails(data);
      this.router.navigate(['home']);
      this.Auth.setLoggedIn(true);
    }
   });


 }
 openPrivacy() {
  const dialogRef1 = this.dialog.open(privacy, {
    width: '700px'
  });
}
openTerms() {
  const dialogRef = this.dialog.open(terms, {
    width: '700px'
  });
}
}
@Component({
  selector: 'privacy',
  templateUrl: '../footer/privacy.html',
  styleUrls: ['../footer/terms.scss']
  })
  export class privacy {
  
  
  constructor(public dialogRef: MatDialogRef<privacy>) {
  
  }
  
  
  }