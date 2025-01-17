import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { MatButtonModule } from '@angular/material/button';
import { MatIconModule } from '@angular/material/icon';
import { MatToolbarModule} from '@angular/material/toolbar';

import { ReactiveFormsModule, FormsModule } from '@angular/forms';
import { PatientRegComponent } from './patient-reg/patient-reg.component';
//import { SearchPageComponent } from './search-page/search-page.component';
import { MatFormFieldModule, MatInputModule, MatSelectModule, MatRadioModule, MatSidenavModule } from '@angular/material';
import { SidenavBarComponent } from './sidenav-bar/sidenav-bar.component';
import { PatientAddmissionComponent } from './patient-addmission/patient-addmission.component';


@NgModule({
  declarations: [
    AppComponent,
    PatientRegComponent,
    //SearchPageComponent,
    SidenavBarComponent,

    PatientAddmissionComponent,

    // ViewRecordsComponent,
    // HomePageComponent,
    // LoginPageComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    BrowserAnimationsModule,
    MatButtonModule,
    MatIconModule,
    MatToolbarModule,
    ReactiveFormsModule,
    MatFormFieldModule,
    MatIconModule,
    MatInputModule,
    MatSelectModule,
    MatRadioModule,
    MatSidenavModule,
    ReactiveFormsModule,
    FormsModule
    
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
