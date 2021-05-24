import { Component, OnInit } from '@angular/core';
import { ApiService } from '../api.service';
import { AuthService } from '../auth.service';

@Component({
  selector: 'app-index',
  templateUrl: './index.component.html',
  styleUrls: ['./index.component.css']
})
export class IndexComponent implements OnInit {
  constructor(public api:ApiService, public auth:AuthService) { }

  mostrarAlumnos:boolean = false;
  mostrarForm:boolean = true;

  nombre:string = "";
  asignatura:string = "";
  fecha:string = "";
  comportamiento:string = "";
  actitud:string = "";
  hora:string = "";

  ngOnInit(): void{
    this.api.getPartes();
    console.log(this.api.usuario);
    console.log(this.mostrarAlumnos);
    console.log(this.mostrarForm);

  }

  logout(){
    this.auth.logout();
  }

  locationCotutorias(){
    this.auth.locationCotutorias();
  }

  accedeAlumno(alumno:any){
    this.mostrarAlumnos = true;
    this.mostrarForm = false;
    this.nombre = alumno.nombre+" "+alumno.apellido1+" "+alumno.apellido2;
    console.log(alumno);
  }

  enviar(){
    //this.api.createParte(this.nombre, '136', this.asignatura, this.fecha, this.hora, this.comportamiento, this.actitud)
    console.log(this.nombre+" "+this.asignatura+" "+this.fecha+" "+this.comportamiento+" "+this.actitud);
  }

}
