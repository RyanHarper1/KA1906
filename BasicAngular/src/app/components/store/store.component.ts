import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { HttpClientModule } from '@angular/common/http';
import {MatSidenavModule} from '@angular/material/sidenav';
import { AuthService } from 'src/app/auth.service';
import { MatIconRegistry } from '@angular/material';
import { DomSanitizer } from '@angular/platform-browser';

@Component({
  selector: 'app-store',
  templateUrl: './store.component.html',
  styleUrls: ['./store.component.scss']
  
})
export class StoreComponent implements OnInit {
  constructor(private Http: HttpClient, private Auth : AuthService, sanitizer: DomSanitizer, iconRegistry: MatIconRegistry) { 
    iconRegistry.addSvgIcon(
      'cart',
      sanitizer.bypassSecurityTrustResourceUrl('../assets/img/cart.png'));
  }
  list: any;
  store:Array<any>;
  i=0;
  loggedIn = false;
  columns = [ 'scriptName','price', 'uploadDate', 'category', 'rating' ];

  isDesc: boolean = false;
  column: string = 'CategoryName';

  ngOnInit() {
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
    let add = this.Http.post('http://localhost:3000/add-item', {storeID: store.storeID, usersID: this.Auth.id, scriptID: store.scriptID, scriptName:store.scriptName, price: store.price,
                  description: store.description, rating: store.rating, uploadDate: store.uploadDate, category: store.category});
    add.subscribe((response) => {

      this.list=response;
      console.log(response)
    });
  }

}
