import { Component, OnInit } from '@angular/core';
import {FormBuilder, FormGroup, Validators, FormControl} from '@angular/forms';
import { MatIconRegistry } from '@angular/material';
import { DomSanitizer } from '@angular/platform-browser';
import { MatDialogRef, MatDialog } from '@angular/material';
import { Router } from '@angular/router';
import { NgxPayPalModule } from 'ngx-paypal';
import {IPayPalConfig, ICreateOrderRequest } from 'ngx-paypal';
import { HttpClient } from '@angular/common/http';
import { AuthService } from 'src/app/auth.service';

declare let paypal: any;

@Component({
  selector: 'app-script-share-subscribe',
  templateUrl: './script-share-subscribe.component.html',
  styleUrls: ['./script-share-subscribe.component.scss']
})


export class ScriptShareSubscribeComponent implements OnInit {
  isLinear = false;
  checked = false;
  firstFormGroup: FormGroup;
  secondFormGroup: FormGroup;
  displayedColumns: string[] = ['itemno', 'itemname', 'amount' ];
  dataSource = ELEMENT_DATA;
  subRadio: any;
  payPrice: string = '';
  list: any;
  submitted = false;
  success = false;

radioChangeHandler(event: any){

  this.payPrice = event.target.value;

}



  constructor(private Auth: AuthService, private _formBuilder: FormBuilder, sanitizer: DomSanitizer, iconRegistry: MatIconRegistry,public dialog: MatDialog, private router: Router, private Http: HttpClient) {
    iconRegistry.addSvgIcon(
      'right',
      sanitizer.bypassSecurityTrustResourceUrl('../assets/img/chevron-right-solid.svg'));
      iconRegistry.addSvgIcon(
        'left',
        sanitizer.bypassSecurityTrustResourceUrl('../assets/img/chevron-left-solid.svg'));

        this.secondFormGroup = new FormGroup({

          subRadio: new FormControl()

        });
  }

  ngOnInit() {
    this.firstFormGroup = this._formBuilder.group({
      fname: ['', Validators.required],
      lname: ['', Validators.required],
      companyName: ['', Validators.required],
      email: ['', Validators.required],
      phone: ['', Validators.required],
      address: ['', Validators.required],
      password: ['', Validators.required],
      firstCtrl: ['', Validators.required]
    });

    this.secondFormGroup = this._formBuilder.group({
      secondCtrl: ['', Validators.required]
    });
    }

    openPrivacy() {
      const dialogRef1 = this.dialog.open(privacy, {
        width: '700px'
      });
    }

    onSubmit(AuthService){
      this.submitted = true;
      if (this.firstFormGroup.invalid) {
        console.log('invalid')
        return;
      } else {

        this.Auth.registerOrg(this.firstFormGroup);
        this.success = true;
      }
    }


    //payPal
    addScript: boolean = false;

        paypalConfig = {
          env: 'sandbox',
          client: {
            sandbox: 'ATLwc0WWOHlrcKAOnk3GauEX2bsQjQjvzi8SnoB7LyUewiXe_XZdcuM-yhK2wKEw_uPNeT4CNdXn0VTv',
            production: 'Ad8s5ANbWU0uocw05O7SirbgSjricgca63l-m-Hk-zfrsh6nFQCs_366WYQQXc6qV2omh4pjTrOqeIB3'
          },
          commit: true,
          payment: (data, actions) => {
            return actions.payment.create({
              payment: {
                transactions: [
                  { amount: { total: this.secondFormGroup.value.secondCtrl, currency: 'AUD' } }
                ]
              }
            });
          },
          onAuthorize: (data, actions) => {
            return actions.payment.execute().then((payment) => {
              console.log('Transaction completed ' + payment.invoice_number);
              this.onSubmit(AuthService);

            })
          }
        };

      ngAfterViewChecked(): void {
          if (!this.addScript) {
            this.addPaypalScript().then(() => {
              paypal.Button.render(this.paypalConfig, '#paypal-checkout-btn');
            })
          }
        }

        addPaypalScript() {
            this.addScript = true;
            return new Promise((resolve, reject) => {
              let scripttagElement = document.createElement('script');
              scripttagElement.src = 'https://www.paypalobjects.com/api/checkout.js';
              scripttagElement.onload = resolve;
              document.body.appendChild(scripttagElement);
            })
          }


          //add Company
  }



  export interface SummarySubscription {
    itemno: number;
    itemname: string;
    amount: number;
  }

  const ELEMENT_DATA: SummarySubscription [] = [
    {itemno: 1, itemname: 'Script Share Monthly Subscription - 1-20 Users', amount: 40.00 },
    {itemno: 2, itemname: 'Script Share Quarterly Subscription - 1-20 Users', amount: 160.00 },
    {itemno: 5, itemname: 'Script Share Quarterly Subscription - 20-100 Users', amount: 320.00},
    {itemno: 6, itemname: 'Script Share Yearly Subscription - 20-100 Users', amount: 960 },
    {itemno: 7, itemname: 'Script Share Monthly Subscription - 100+ Users', amount: 160 },
    {itemno: 8, itemname: 'Script Share Quarterly Subscription - 100+ Users', amount: 640 },
    {itemno: 9, itemname: 'Script Share Yearly Subscription - 100+ Users', amount: 1920 },
  ];


  @Component({
    selector: 'privacy',
    templateUrl: '../footer/privacy.html',
    styleUrls: ['../footer/terms.scss']
    })
    export class privacy {


    constructor(public dialogRef: MatDialogRef<privacy>) {

    }
    }
