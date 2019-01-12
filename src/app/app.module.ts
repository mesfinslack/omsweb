import { BrowserModule } from '@angular/platform-browser';
import { NgModule, NO_ERRORS_SCHEMA } from '@angular/core';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';

import { MDBBootstrapModule, CarouselModule, WavesModule  } from 'angular-bootstrap-md';
import { FormsModule } from '@angular/forms';
import { HomeComponent } from './components/main/home/home.component';
import { FooterComponent } from './components/main/footer/footer.component';
import { HeaderComponent } from './components/main/header/header.component';
import { LoginComponent } from './components/main/login/login.component';
import { SignupCustomerComponent } from './components/main/signup-customer/signup-customer.component';
import { SignupAgencyComponent } from './components/main/signup-agency/signup-agency.component';
import { SignupAdminComponent } from './components/main/signup-admin/signup-admin.component';
import { ContactusComponent } from './components/main/contactus/contactus.component';
import { NewsAdvertsComponent } from './components/main/news-adverts/news-adverts.component';
import { ForgetPasswordComponent } from './components/main/forget-password/forget-password.component';
import { AboutusComponent } from './components/main/aboutus/aboutus.component';
import { TopMaidsComponent } from './components/main/top-maids/top-maids.component';


import { HttpClientModule } from '@angular/common/http';


import { MainService } from './services/main.service';
import { AgencyService } from './services/agency.service';
import { AdminService } from './services/admin.service';
import { CustomerService } from './services/customer.service';
import { MaidService } from './services/maid.service';



import { AdminReportComponent } from './components/admin/admin-report/admin-report.component';
import { AdminProfileComponent } from './components/admin/admin-profile/admin-profile.component';

import { AgencyProfileComponent } from './components/agency/agency-profile/agency-profile.component';
import { AgencyReportComponent } from './components/agency/agency-report/agency-report.component';
import { SearchAgencyComponent } from './components/agency/search-agency/search-agency.component';
import { AgencyDetailComponent } from './components/agency/agency-detail/agency-detail.component';
import { ListAgencyComponent } from './components/agency/manage-agency/list-agency/list-agency.component';
import { CreateAgencyComponent } from './components/agency/manage-agency/create-agency/create-agency.component';
import { EditAgencyComponent } from './components/agency/manage-agency/edit-agency/edit-agency.component';
import { AgencyRequestDetailComponent } from './components/agency/manage-agency/agency-request-detail/agency-request-detail.component';
import { ShowAgencyDetailComponent } from './components/agency/manage-agency/show-agency-detail/show-agency-detail.component';

import { SearchMaidComponent } from './components/maid/search-maid/search-maid.component';
import { MaidDetailComponent } from './components/maid/maid-detail/maid-detail.component';
import { ListMaidComponent } from './components/maid/manage-maid/list-maid/list-maid.component';
import { ShowMaidDetailComponent } from './components/maid/manage-maid/show-maid-detail/show-maid-detail.component';
import { CreateMaidComponent } from './components/maid/manage-maid/create-maid/create-maid.component';
import { EditMaidComponent } from './components/maid/manage-maid/edit-maid/edit-maid.component';
import { MaidRequestComponent } from './components/maid/manage-maid/maid-request/maid-request.component';
import { MaidRequestDetailComponent } from './components/maid/manage-maid/maid-request-detail/maid-request-detail.component';
import { AssignMaidComponent } from './components/maid/manage-maid/assign-maid/assign-maid.component';
import { AssignedMaidComponent } from './components/maid/manage-maid/assigned-maid/assigned-maid.component';
import { CustomerProfileComponent } from './components/customer/customer-profile/customer-profile.component';
import { AgencyRequestComponent } from './components/agency/manage-agency/agency-request/agency-request.component';


@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    HomeComponent,
    FooterComponent,  AppComponent,
    HomeComponent,
    FooterComponent,
    LoginComponent,
    SignupCustomerComponent,
    SignupAgencyComponent,
    SignupAdminComponent,
    AboutusComponent,
    ContactusComponent,
    NewsAdvertsComponent,
    ForgetPasswordComponent,
    TopMaidsComponent,
    AgencyRequestComponent,

    AppComponent,
    SearchMaidComponent,
    SearchMaidComponent,
    HomeComponent,
    FooterComponent,
    LoginComponent,
    SignupCustomerComponent,
    SignupAgencyComponent,
    SignupAdminComponent,
    AboutusComponent,
    ContactusComponent,
    NewsAdvertsComponent,
    ForgetPasswordComponent,
    AdminReportComponent,
    AdminProfileComponent,
    AgencyProfileComponent,
    AgencyReportComponent,
    SearchAgencyComponent,
    SearchMaidComponent,
    
    AgencyRequestDetailComponent,
    AgencyDetailComponent,
    ListAgencyComponent,
    CreateAgencyComponent,
    EditAgencyComponent,
    ShowAgencyDetailComponent,
    MaidDetailComponent,
    ListMaidComponent,
    ShowMaidDetailComponent,
    CreateMaidComponent,
    EditMaidComponent,
    MaidRequestComponent,
    MaidRequestDetailComponent,
    AssignMaidComponent,
    AssignedMaidComponent,
    CustomerProfileComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule ,
    BrowserAnimationsModule,
    HttpClientModule,
    MDBBootstrapModule.forRoot(),
    CarouselModule, WavesModule,

    FormsModule,

  ],
  providers: [
    MaidService,
    MainService,
    AgencyService,
    AdminService,
    CustomerService
  ],
  bootstrap: [AppComponent],
  schemas: [ NO_ERRORS_SCHEMA ]
})
export class AppModule { }
