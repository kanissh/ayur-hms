import { Component, NgModule, OnInit } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { SidenavBarComponent } from '../sidenav-bar/sidenav-bar.component';

@Component({
  selector: 'app-patient-reg',
  templateUrl: './patient-reg.component.html',
  styleUrls: ['./patient-reg.component.css']
}) 

@NgModule({
  imports: [SidenavBarComponent]
})

export class PatientRegComponent implements OnInit {

  page = {name: 'Patient Registration'};
  hospitalsCdList: String[] = ['Anuradhapura', 'Polonnaruwa'];
  patientRegistrationForm: FormGroup;

  ngOnInit() {
    this.patientRegistrationForm = new FormGroup({
      'hospitalsCd': new FormControl(null),
      'patientName': new FormControl(null,[Validators.required, Validators.pattern("^[A-Za-z\\s]+$")]),
      'nic': new FormControl(null , [Validators.required, Validators.pattern("^\\d{12}|\\d{9}[XV]$")]),
      'age': new FormControl(null , [Validators.required, Validators.min(1), Validators.max(120)]),
      'gender': new FormControl('not-specified'),
      'address': new FormControl(null),
      'phoneNumber': new FormControl(null , [Validators.required, Validators.pattern("^\\d{10}|[123456789]\\d{8}$")]),
      'occupation': new FormControl(null),
      'otherNotes': new FormControl(null)
    });
  }

  onSubmit(){
  
    console.log(this.patientRegistrationForm);
   
    this.resetForm();
  }

  resetForm(){
    this.patientRegistrationForm.reset();
  }

}
