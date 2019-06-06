import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { LoginComponent } from './components/login/login.component';
import { RegisterComponent } from './components/register/register.component';
import { HomeComponent } from './components/home/home.component';
import { NavComponent } from './components/nav/nav.component';
import { ReactiveFormsModule} from '@angular/forms';
import { BuildScriptComponent, DialogForm } from './components/build-script/build-script.component';
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
import {MatButtonModule, MatRadioModule,  MatCheckboxModule, MatSidenavModule, MatSidenavContent, MatSidenav, MatFormFieldModule, MatInputModule, MatSelectModule, MatMenuModule, MatToolbarModule,MatIconModule, MatTabsModule, MatDialogModule, MatCardModule} from '@angular/material';
import { FormsModule} from '@angular/forms';
import { EditScriptComponent } from './components/edit-script/edit-script.component';
import { UpdateDetailsComponent } from './components/update-details/update-details.component';
import { CartService } from './cart.service';
import { NgxPayPalModule } from 'ngx-paypal'
import { AdminComponent } from './components/admin/admin.component';
import {MatGridListModule} from '@angular/material/grid-list';
import { ViewScriptComponent } from './components/view-script/view-script.component';
<<<<<<< HEAD
<<<<<<< HEAD
import { FooterComponent, terms, contact } from './components/footer/footer.component';
import { NgxEditorModule } from 'ngx-editor';
import { TooltipModule } from 'ngx-bootstrap/tooltip';



=======
import { FooterComponent } from './components/footer/footer.component';
>>>>>>> parent of 6628a2df... Merge branch 'master' into jlee
=======
import { FooterComponent } from './components/footer/footer.component';
>>>>>>> parent of 6628a2df... Merge branch 'master' into jlee

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
    NgxEditorModule,
    TooltipModule.forRoot(),

  ],
  exports: [
    MatToolbarModule, MatIconModule, MatMenuModule,
  ],
  providers: [AuthGuard, AuthService,ViewScriptComponent],
  bootstrap: [AppComponent]
})
export class AppModule { }

