import { Component, OnInit, AfterViewChecked } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { HttpClientModule } from '@angular/common/http';
import {MatSidenavModule} from '@angular/material/sidenav';
import { AuthService } from 'src/app/auth.service';
import { CartService } from 'src/app/cart.service';
import { Router } from '@angular/router';
import { NgxPayPalModule } from 'ngx-paypal';
import {IPayPalConfig, ICreateOrderRequest } from 'ngx-paypal';



declare let paypal: any;//Paypal Test

@Component({
  selector: 'app-cart',
  templateUrl: './cart.component.html',
  styleUrls: ['./cart.component.scss']
})

export class CartComponent implements OnInit {
  constructor(private Http: HttpClient, private Auth : AuthService, private router: Router) { }
  list: any;
  loggedIn = false;
  columns = [ 'scriptName','price', 'uploadDate', 'category', 'rating' ];

  public payPalConfig ? : IPayPalConfig;
  idPayPal: any; //paypal

  ngOnInit(): void {
    this.loggedIn = this.Auth.loggedIn
    //this.initConfig();//ngrx-paypal
    if (this.loggedIn){
      let cart = this.Http.post('http://localhost:3000/cart', {id: this.Auth.getId});
      cart.subscribe((response) => {

        this.list=response;
        console.log(response)
      });
    }
  }

//Paypal Test
  addScript: boolean = false;

  clearCart(cart){
    let del = this.Http.post('http://localhost:3000/clear-cart', {usersID: this.Auth.getId});
    del.subscribe((response) => {

      this.list=response;
      console.log(response)
      this.router.navigate(['/cart']);
    });
    console.log(cart);
  }

  addToPayment(cart){
    let add = this.Http.post('http://localhost:3000/payment-details', {storeID: cart.storeID, usersID: this.Auth.getId, scriptID: cart.scriptID, scriptName: cart.scriptName, price: this.getTotal,
                  description: cart.description, rating: cart.rating, uploadDate: cart.uploadDate, category: cart.category});
    add.subscribe((response) => {

      this.list=response;
      console.log(response)
      this.router.navigate(['/cart']);
    });
    console.log(cart);
  }

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
              { amount: { total: 0.01, currency: 'AUD' } }
            ]
          }
        });
      },
      onAuthorize: (data, actions) => {
        return actions.payment.execute().then((payment) => {
          //this.addToPayment(this.list);
          console.log('Transaction completed '/* + payment.payer_given_name*/);
          this.clearCart(this.list);
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
    let del = this.Http.post('http://localhost:3000/delete-item', {cartID: cart.cartID});
    del.subscribe((response) => {

      this.list=response;
      console.log(response)
      this.router.navigate(['/cart']);
    });
    console.log(cart);
  }

//sum price
getTotal() {
  let total = 0;
  for (var i = 0; i < this.list.length; i++) {
      if (this.list[i].price) {
          total += this.list[i].price;
      }
  }
  return total.toFixed(Math.max(2,2));
}

load(val) {
if (val == this.router.url) {
  //this.spinnerService.show();
  this.router.routeReuseStrategy.shouldReuseRoute = function () {
    return false;
  };
 }
}
}
