import { Component, Input, OnInit } from '@angular/core';

@Component({
  selector: 'app-sidenav-bar',
  templateUrl: './sidenav-bar.component.html',
  styleUrls: ['./sidenav-bar.component.css']
})
export class SidenavBarComponent implements OnInit {

  @Input('page-title') pageTitle: String;
  @Input('top-nav-btns') topNavButtons: Boolean = true; 
  constructor() { }

  ngOnInit() {
  }

}
