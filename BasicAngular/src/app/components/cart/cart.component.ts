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
//  id:any;
  loggedIn = false;
  columns = [ 'scriptName','price', 'uploadDate', 'category', 'rating' ];

public payPalConfig ? : IPayPalConfig;

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

/*Paypal-NgxPayPalModule
private initConfig(): void {
        this.payPalConfig = {
            currency: 'AUD',
            clientId: 'ATLwc0WWOHlrcKAOnk3GauEX2bsQjQjvzi8SnoB7LyUewiXe_XZdcuM-yhK2wKEw_uPNeT4CNdXn0VTv',
            advanced: {
                commit: 'true'
            },
            style: {
                label: 'paypal',
                layout: 'vertical'
            },
            onApprove: (data, actions) => {
                console.log('onApprove - transaction was approved, but not authorized', data, actions);

                    console.log('onApprove - you can get full order details inside onApprove: ');
            },
            onClientAuthorization: (data) => {
                console.log('onClientAuthorization - you should probably inform your server about completed transaction at this point', data);
                //this.showSuccess = true;
            },
            onCancel: (data, actions) => {
                console.log('OnCancel', data, actions);
                //this.showCancel = true;

            },
            onError: err => {
                console.log('OnError', err);
                //this.showError = true;
            },
            onClick: () => {
                console.log('onClick');
                //this.resetStatus();
            },
        };
    }



//paypal-NgxPayPalModule*/


//Paypal Test
  addScript: boolean = false;

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
              { amount: { total: 0.01, currency: 'AUD' } }
            ]
          }
        });
      },
      onAuthorize: (data, actions) => {
        return actions.payment.execute().then((payment) => {
          //Do something when payment is successful.
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
