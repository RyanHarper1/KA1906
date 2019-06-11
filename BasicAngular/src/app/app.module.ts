import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { LoginComponent, privacy } from './components/login/login.component';
import { RegisterComponent } from './components/register/register.component';
import { HomeComponent } from './components/home/home.component';
import { NavComponent} from './components/nav/nav.component';
import { ReactiveFormsModule} from '@angular/forms';
import { BuildScriptComponent, DialogForm } from './components/build-script/build-script.component';
import { ExampleScriptComponent } from './components/example-script/example-script.component';
import { StoreComponent } from './components/store/store.component';
import { CartComponent } from './components/cart/cart.component';
import { CurrentScriptsComponent, uploadForm } from './components/current-scripts/current-scripts.component';
import { HttpClientModule } from '@angular/common/http';
import { AuthService } from './auth.service'
import { HttpClient } from '@angular/common/http';
import { AuthGuard } from './auth.guard';
import { ScriptShareComponent } from './components/script-share/script-share.component';
import {BrowserAnimationsModule} from '@angular/platform-browser/animations';
import {MatButtonModule, MatRadioModule,  MatCheckboxModule, MatSidenavModule, MatSidenavContent, MatSidenav, MatFormFieldModule, MatInputModule, MatSelectModule, MatMenuModule, MatToolbarModule,MatIconModule, MatTabsModule, MatDialogModule, MatCardModule, MatSnackBar, MatSnackBarModule, MAT_SNACK_BAR_DEFAULT_OPTIONS} from '@angular/material';
import { FormsModule } from '@angular/forms';
import { EditScriptComponent } from './components/edit-script/edit-script.component';
import { UpdateDetailsComponent } from './components/update-details/update-details.component';
import { CartService } from './cart.service';
import { NgxPayPalModule } from 'ngx-paypal'
import { AdminComponent } from './components/admin/admin.component';
import {MatGridListModule} from '@angular/material/grid-list';
import { ViewScriptComponent } from './components/view-script/view-script.component';
import { FooterComponent, terms, contact } from './components/footer/footer.component';
import { ScriptShareSubscribeComponent } from './components/script-share-subscribe/script-share-subscribe.component';
import {MatStepperModule} from '@angular/material/stepper';
import {MatTableModule} from '@angular/material/table';
import { FlexLayoutModule } from '@angular/flex-layout';
import { NgxEditorModule } from 'ngx-editor';
import { TooltipModule } from 'ngx-bootstrap/tooltip';
import { StarRatingModule } from 'angular-star-rating';
import { RatingPipe } from './pipes/rating.pipe';
import { CategoryPipe } from './pipes/category.pipe';
import { MinPricePipe } from './pipes/min-price.pipe';
import { SubCategoryPipe } from './pipes/sub-category.pipe';
import { Ng2SearchPipeModule } from 'ng2-search-filter';
import { confirm} from './components/cart/cart.component';


@NgModule({
  declarations: [
    AppComponent,
    LoginComponent,
    RegisterComponent,
    HomeComponent,
    NavComponent,
    BuildScriptComponent,
    ExampleScriptComponent,
    StoreComponent,
    CartComponent,
    CurrentScriptsComponent,
    ScriptShareComponent,
    EditScriptComponent,
    UpdateDetailsComponent,
    DialogForm,
    AdminComponent,
    ViewScriptComponent,
    FooterComponent,
    terms,
    privacy,
    contact,
    ScriptShareSubscribeComponent,
    uploadForm,
    RatingPipe,
    CategoryPipe,
    MinPricePipe,
    SubCategoryPipe,
    confirm

  ],
  imports: [
    FormsModule,
    BrowserModule,
    AppRoutingModule,
    ReactiveFormsModule,
    HttpClientModule,
    BrowserAnimationsModule,
    MatButtonModule,
    MatCheckboxModule,
    MatSidenavModule,
    MatFormFieldModule,
    MatInputModule ,
    MatSelectModule,
    MatToolbarModule,
    MatIconModule,
    MatMenuModule,
    MatTabsModule,
    NgxPayPalModule,
    MatDialogModule,
    MatRadioModule,
    MatGridListModule,
    MatCardModule,
    MatStepperModule,
    MatTableModule,
    FlexLayoutModule,
    NgxEditorModule,
    TooltipModule,
    StarRatingModule.forRoot(),
    Ng2SearchPipeModule,
    MatSnackBarModule,
    

  ],
  exports: [
    MatToolbarModule, MatIconModule, MatMenuModule,privacy
  ],
  providers: [AuthGuard, AuthService,ViewScriptComponent, {provide: MAT_SNACK_BAR_DEFAULT_OPTIONS, useValue: {duration: 2500}}],
  bootstrap: [AppComponent]
})
export class AppModule { }
