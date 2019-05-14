import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { HttpClientModule } from '@angular/common/http';
import {MatSidenavModule} from '@angular/material/sidenav';
import { AuthService } from 'src/app/auth.service';
import { CartService } from 'src/app/cart.service';
import { CartComponent } from '../cart/cart.component';
import { Router } from '@angular/router';

@Component({
  selector: 'app-store',
  templateUrl: './store.component.html',
  styleUrls: ['./store.component.scss']

})
export class StoreComponent implements OnInit {
  constructor(private Http: HttpClient, private Auth : AuthService, private cartService: CartService, private router: Router) { }
  list: any;
  loggedIn = false;
  columns = [ 'scriptName','category', 'uploadDate', 'category', 'rating' ];

  ngOnInit() {
    this.loggedIn = this.Auth.loggedIn
    let store = this.Http.get('http://localhost:3000/store');
    store.subscribe((response) => {

      this.list=response;
      console.log(response)
    });
  }

  /*setCart(cart){
    this.cartService.setStoreID(cart.storeId);
    console.log(cart);
  }*/

  addToCart(store){
    let add = this.Http.post('http://localhost:3000/add-item', {storeID: store.storeId});
    add.subscribe((response) => {

      this.list=response;
      console.log(response)
      this.router.navigate(['/store']);
    });
    console.log(store);
  }

}
