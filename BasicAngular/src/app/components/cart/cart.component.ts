import { Component, OnInit, AfterViewChecked } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { HttpClientModule } from '@angular/common/http';
import {MatSidenavModule} from '@angular/material/sidenav';
import { AuthService } from 'src/app/auth.service';
import { CartService } from 'src/app/cart.service';
import { Router } from '@angular/router';
import { NgxPayPalModule } from 'ngx-paypal';
import {IPayPalConfig, ICreateOrderRequest } from 'ngx-paypal';
import { MatIconRegistry } from '@angular/material';
import { DomSanitizer } from '@angular/platform-browser';
import { MatDialog, MAT_DIALOG_DATA, MatDialogRef } from '@angular/material';



declare let paypal: any;//Paypal Test

@Component({
  selector: 'app-cart',
  templateUrl: './cart.component.html',
  styleUrls: ['./cart.component.scss'],
})



export class CartComponent implements OnInit {
  constructor(private Http: HttpClient, private Auth : AuthService, private router: Router, sanitizer: DomSanitizer, iconRegistry: MatIconRegistry, public dialog: MatDialog) {
    iconRegistry.addSvgIcon(
      'delete',
      sanitizer.bypassSecurityTrustResourceUrl('../assets/times-solid.svg'));
   }
  list: any;
  loggedIn = false;
  columns = [ 'scriptName','price', 'uploadDate', 'category', 'rating' ];


  public payPalConfig ? : IPayPalConfig;
  idPayPal: any; //paypal

  ngOnInit(): void {
    this.loggedIn = this.Auth.loggedIn
    //this.initConfig();//ngrx-paypal
    if (this.loggedIn){
      let cart = this.Http.post('http://salesscript.com.au/sql/cart', {id: this.Auth.getId});
      cart.subscribe((response) => {

        this.list=response;
      });
    }
  }

//Paypal Test
  addScript: boolean = false;

  clearCart(){
    let del = this.Http.post('http://salesscript.com.au/sql/clear-cart', {usersID: this.Auth.getId});
    del.subscribe((response) => {

      this.list=response;
      this.ngOnInit();
    });
  }

  addToPayment(cart){
    let add = this.Http.post('http://salesscript.com.au/sql/payment-details', {storeID: cart.storeID, usersID: this.Auth.getId, scriptID: cart.scriptID, scriptName: cart.scriptName, price: this.getTotal(),
                  description: cart.description, rating: cart.rating, uploadDate: cart.uploadDate, category: cart.category});
    add.subscribe((response) => {

      this.list=response;
      this.router.navigate(['/cart']);
    });
  }

    paypalConfig = {
      env: 'production',
      client: {
        sandbox: 'ATLwc0WWOHlrcKAOnk3GauEX2bsQjQjvzi8SnoB7LyUewiXe_XZdcuM-yhK2wKEw_uPNeT4CNdXn0VTv',
        production: 'Ad8s5ANbWU0uocw05O7SirbgSjricgca63l-m-Hk-zfrsh6nFQCs_366WYQQXc6qV2omh4pjTrOqeIB3'
      },
      commit: true,
      payment: (data, actions) => {
        return actions.payment.create({
          payment: {
            transactions: [
              { amount: { total: this.getTotal(), currency: 'AUD' } }
            ]
          }
        });
      },
      // onAuthorize: (data, actions) => {
      //   return actions.payment.execute().then((payment) => {
      //     this.addToPayment(this.list);
      //     this.clearCart();
      //     this.confirmation();
      //     this.router.navigate(['current-scripts']);
      //   })
      // }
      onAuthorize: (data, actions) => {
        return actions.payment.execute().then((payment) => {
          for(let i=0; i<this.list.length; i++){
            this.addToPayment(this.list[i]);
          }
          //console.log('Transaction completed ' + payment.invoice_number);
          this.confirmation();
          this.clearCart();
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
    //Paypal Test

  deleteCart(cart){
    let del = this.Http.post('http://salesscript.com.au/sql/delete-item', {cartID: cart.cartID});
    del.subscribe((response) => {

      this.list=response;
      this.ngOnInit();
    });
  }

//sum price
getTotal(): number {
  let total: number = 0;
  for (var i = 0; i < this.list.length; i++) {
      if (this.list[i].price) {
          total += this.list[i].price;
      }
  }
  return total;
}

  load(val) {
  if (val == this.router.url) {
    //this.spinnerService.show();
    this.router.routeReuseStrategy.shouldReuseRoute = function () {
      return false;
    };
   }
  }

  confirmation() {
    const dialogRef = this.dialog.open(confirm, {
      width: '700px'
    });
  }

}
@Component({
  selector: 'confirm',
  templateUrl: 'confirm.html'
})
export class confirm implements OnInit {
  price: any;
  constructor(public dialogRef: MatDialogRef<confirm>) {

  }
  ngOnInit() {}
}
