import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { HttpClientModule } from '@angular/common/http';
import {MatSidenavModule} from '@angular/material/sidenav';
import { AuthService } from 'src/app/auth.service';
import { CartService } from 'src/app/cart.service';
import { CartComponent } from '../cart/cart.component';
import { Router } from '@angular/router';
import{ CategoryPipe } from '../../pipes/category.pipe';
import{ MinPricePipe } from '../../pipes/min-price.pipe';
//import {MatDatePickerModule} from '@angular/material/datepicker';




@Component({
  selector: 'app-store',
  templateUrl: './store.component.html',
  styleUrls: ['./store.component.scss'],
  providers: [MinPricePipe, CategoryPipe],


})
export class StoreComponent implements OnInit {

   thumbLabel = true;

  constructor(private Http: HttpClient, private Auth : AuthService, private cartService: CartService, private router: Router) { }
  list: any;
  store:Array<any>;
  i=0;
  loggedIn = false;
  columns = [ 'scriptName','category', 'uploadDate', 'category', 'rating' ];
  usersID: any;

  isDesc: boolean = false;
  column: string = 'CategoryName';

  ngOnInit() {
    this.usersID = this.Auth.getId;
    this.loggedIn = this.Auth.loggedIn
    let store = this.Http.get('http://localhost:3000/store');
    store.subscribe((response) => {

      this.list=response;
      console.log(response);
    });
  }

  /*setCart(cart){
    this.cartService.setStoreID(cart.storeId);
    console.log(cart);
  }*/

  addToCart(store){
    let add = this.Http.post('http://localhost:3000/add-item', {storeID: store.storeID, usersID: this.usersID, scriptID: store.scriptID, scriptName:store.scriptName, price: store.price,
                  description: store.description, rating: store.rating, uploadDate: store.uploadDate, category: store.category});
    add.subscribe((response) => {

      this.list=response;
      console.log(response)
      this.router.navigate(['/store']);
    });
    console.log(store);
  }

}
