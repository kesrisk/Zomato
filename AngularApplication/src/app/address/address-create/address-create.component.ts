import { Component, OnInit, Output, EventEmitter } from '@angular/core';
import { FormGroup, FormBuilder } from '@angular/forms';

@Component({
  selector: 'app-address-create',
  templateUrl: './address-create.component.html',
  styleUrls: ['./address-create.component.css']
})
export class AddressCreateComponent implements OnInit {
  @Output() createAddressValues = new EventEmitter ();
  createAddressForm: FormGroup;

  constructor(private fb: FormBuilder) { }

  ngOnInit() {

    this.createAddressForm = this.fb.group({
      street: [''],
      district: [''],
      state: [''],
    });
  }

  create(formValues){

    this.createAddressValues.emit(formValues);
  }


}
