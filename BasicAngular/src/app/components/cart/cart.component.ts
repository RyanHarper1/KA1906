import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { AuthService } from 'src/app/auth.service';
import { Router } from '@angular/router';

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
  loaded = false;

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
        this.loaded = true;
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
      this.ngOnInit();
    });
    console.log(cart);
  }


}
