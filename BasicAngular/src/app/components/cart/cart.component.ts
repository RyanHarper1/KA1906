import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { HttpClientModule } from '@angular/common/http';
import {MatSidenavModule} from '@angular/material/sidenav';
import { AuthService } from 'src/app/auth.service';
import { CartService } from 'src/app/cart.service';
import { Router } from '@angular/router';

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

  ngOnInit() {
    this.loggedIn = this.Auth.loggedIn
    if (this.loggedIn){
      let cart = this.Http.post('http://localhost:3000/cart', {id: this.Auth.getId});
      cart.subscribe((response) => {

        this.list=response;
        console.log(response)
      });
    }
  }

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
  return total;
}

}
