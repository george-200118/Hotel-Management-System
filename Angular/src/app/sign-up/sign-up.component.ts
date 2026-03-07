import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { HttpClient, HttpHeaders } from '@angular/common/http';
@Component({
  selector: 'app-sign-up',
  templateUrl: './sign-up.component.html',
  styleUrls: ['./sign-up.component.css']
})
export class SignUpComponent implements OnInit {
  contectForm: FormGroup;
  Is_Error:boolean=false;
  Email_Found:boolean=false;
  Check_Email:boolean;
  Phone_Found:boolean=false;
  Name_Found:boolean=false;
  Address_Found:boolean=false;
  base_url = "http://localhost:8000/api/";
  constructor(private fb: FormBuilder, private http: HttpClient) { 
    this.contectForm = fb.group({
      Name: ['', Validators.required],
      Email: ['', Validators.required],
      Phone: ['', Validators.required],
      Address: ['', Validators.required]
    });
  }

  ngOnInit() {
  }
save_customer(contectForm) {
    if (this.contectForm.invalid) {
      this.Is_Error=true;
      console.log('Invalid signup form');
      return;
    }

    const headers = new HttpHeaders();
    headers.append('Content-Type', 'multipart/form-data');
    headers.append('Accept', 'application/json');
    let options = {
      headers: headers,
    };
    this.http.post(this.base_url + 'check-name', contectForm.value, options).subscribe((data) => {
      console.log(data);
      this.contectForm.reset();
      let res=Array.from(Object.keys(data),k=>data[k]);
      if(res[0]=='false'){
      this.Name_Found=true;
      console.log('Name Exists');
    }
    });
    
    this.http.post(this.base_url + 'check-phone', contectForm.value, options).subscribe((data) => {
      console.log(data);
      this.contectForm.reset();
      let res=Array.from(Object.keys(data),k=>data[k]);
      if(res[0]=='false'){
      this.Phone_Found=true;
      console.log('Phone Exists');
    }
    });
    this.http.post(this.base_url + 'check-email-signup', contectForm.value, options).subscribe((data) => {
      console.log(data);
      this.contectForm.reset();
      let res=Array.from(Object.keys(data),k=>data[k]);
      if(res[0]=='false'){
      this.Email_Found=true;
      console.log('Email Exists');
    }
    });
    console.log('Email is'+ this.Email_Found);

    this.http.post(this.base_url + 'check-address', contectForm.value, options).subscribe((data) => {
      console.log(data);
      this.contectForm.reset();
      let res=Array.from(Object.keys(data),k=>data[k]);
      if(res[0]=='false'){
      this.Address_Found=true;
      console.log('Address Exists');
    }
    });
    console.log('Address:'+this.Address_Found);
    console.log('Email:'+this.Email_Found);
    console.log('Name:'+this.Name_Found);
    console.log('Phone:'+this.Phone_Found);

/*
    if(this.Address_Found==false && this.Email_Found==false && this.Name_Found==false && this.Phone_Found==false){
    this.http.post(this.base_url + 'save-customer', contectForm.value, options).subscribe((data) => {
      console.log(data);
      this.contectForm.reset();
      alert('Contact Query Successfully Send');
    });
  }
    */
    console.log(contectForm.value);
  }
}
