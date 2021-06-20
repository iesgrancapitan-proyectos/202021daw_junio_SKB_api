import { Injectable } from '@angular/core';
import { AngularFireAuth } from "@angular/fire/auth";
import { Router } from '@angular/router';
import * as firebase from 'firebase';
import { CookieService } from 'ngx-cookie-service';

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  
  constructor(private fire:AngularFireAuth, private router:Router, public cookies:CookieService) {
    
  }
  
 
  login(){
    this.fire.signInWithPopup(new firebase.default.auth.GoogleAuthProvider()).then(res => {
      this.fire.user.subscribe(lg => {      
        if(lg.email.split('@')[1] == "iesgrancapitan.org"){
          this.cookies.set("emailFoto", lg.photoURL)
          this.cookies.set("email", lg.email, 0.25);
          this.cookies.set("location", "index");
          this.router.navigate(["/index"]);
        }else{
        }
      })
      
      }, err => {
      })
  }

  logout(){
    this.fire.signOut().then(res => {
      this.cookies.deleteAll();
      this.router.navigate(["/home"]);
      }, err => {
      })
  }

  relocate(location:string){
    this.cookies.set("relocate", "proper")
    this.router.navigate(["/"+location]);
  }
}
