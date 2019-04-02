import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { LoginComponent } from './components/login/login.component';
import { RegisterComponent } from './components/register/register.component';
import { HomeComponent } from './components/home/home.component';
import { NavComponent } from './components/nav/nav.component';
import { ReactiveFormsModule} from '@angular/forms';
import { BuildScriptComponent } from './components/build-script/build-script.component';
import { ExampleScriptComponent } from './components/example-script/example-script.component';
import { StoreComponent } from './components/store/store.component';
import { CartComponent } from './components/cart/cart.component';
import { CurrentScriptsComponent } from './components/current-scripts/current-scripts.component';
import { HttpClientModule } from '@angular/common/http'; 
import { AuthService } from './auth.service'
import { HttpClient } from '@angular/common/http'; 
import { AuthGuard } from './auth.guard';
import { ScriptShareComponent } from './components/script-share/script-share.component';
import {BrowserAnimationsModule} from '@angular/platform-browser/animations';
import {MatButtonModule, MatCheckboxModule, MatSidenavModule, MatSidenavContent, MatSidenav, MatFormFieldModule, MatInputModule, MatSelectModule} from '@angular/material';

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
    
  ],
  imports: [
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
    MatSelectModule
  ],
  providers: [AuthGuard, AuthService],
  bootstrap: [AppComponent]
})
export class AppModule { }
