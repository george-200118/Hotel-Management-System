import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import {Router} from '@angular/router';
@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.css']
})
export class RegisterComponent implements OnInit {
  loginForm: FormGroup;
  Is_Error: boolean = false;
  notFound: boolean = false;
  base_url = "http://localhost:8000/api/";
  constructor(private fb: FormBuilder, private http: HttpClient,private router:Router) {
    this.loginForm = fb.group({
      Email: ['', Validators.required]
    });
  }
  ngOnInit() {
  }
  register(loginForm){
    if (this.loginForm.invalid) {
      this.Is_Error = true;
      console.log('Invalid signup form');
      return;
    }
    const headers = new HttpHeaders();
    headers.append('Content-Type', 'multipart/form-data');
    headers.append('Accept', 'application/json');
    let options = {
      headers: headers,
    };
    this.http.post(this.base_url + 'check-email', loginForm.value, options).subscribe((data) => {
      console.log(data);
      this.loginForm.reset();
      let res=Array.from(Object.keys(data),k=>data[k]);
    if(res[0]=='false'){
    this.notFound=true;
    console.log('Email Not Found SignUp First');
    }
    else{
      this.router.navigate(['/reservation']);
    }
    });
  }
}
