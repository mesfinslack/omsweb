import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { HomeComponent } from './components/main/home/home.component';
import { LoginComponent } from './components/main/login/login.component';
import { ContactusComponent } from './components/main/contactus/contactus.component';
import { AboutusComponent } from './components/main/aboutus/aboutus.component';
import { SignupCustomerComponent } from './components/main/signup-customer/signup-customer.component';
import { SignupAgencyComponent } from './components/main/signup-agency/signup-agency.component';
import { SignupAdminComponent } from './components/main/signup-admin/signup-admin.component';
import { SearchMaidComponent } from './components/maid/search-maid/search-maid.component';
import { SearchAgencyComponent } from './components/agency/search-agency/search-agency.component';
import { MaidDetailComponent } from './components/maid/maid-detail/maid-detail.component';

const routes: Routes = [
  { path: '', component: HomeComponent },
  { path: 'searchMaid', component: SearchMaidComponent },
  { path: 'searchmaid/show/:id', component: MaidDetailComponent },
  { path: 'searchAgency', component: SearchAgencyComponent},
  { path:'contactus', component: ContactusComponent},
  { path:'aboutus', component: AboutusComponent},
  { path:'signupcustomer', component: SignupCustomerComponent},
  { path:'signupagency', component: SignupAgencyComponent}, 
  { path:'signupadmin', component: SignupAdminComponent},  
  { path: 'login', component: LoginComponent },]; 

  

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
