import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { AppComponent } from './app.component';
import { LoginComponent } from './components/login/login.component';
import { RegisterComponent } from './components/register/register.component';
import { HomeComponent } from './components/home/home.component';

import { CartComponent } from './components/cart/cart.component';
import { BuildScriptComponent } from './components/build-script/build-script.component';
import { CurrentScriptsComponent } from './components/current-scripts/current-scripts.component';
import { ExampleScriptComponent } from './components/example-script/example-script.component';
import { StoreComponent } from './components/store/store.component';

const routes: Routes = [
  {
      path: '',
      component: HomeComponent
  },
  {
    path: 'login',
    component: LoginComponent
  },
  {
  path: 'register',
  component: RegisterComponent
},
{
  path: 'home',
  component: HomeComponent
},

{
  path: 'cart',
  component: CartComponent
},
{
  path: 'build-script',
  component: BuildScriptComponent
} ,
{
  path: 'current-script',
  component: CurrentScriptsComponent
},
{
  path: 'example-script',
  component: ExampleScriptComponent
},
{
  path: 'store',
  component: StoreComponent
}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
