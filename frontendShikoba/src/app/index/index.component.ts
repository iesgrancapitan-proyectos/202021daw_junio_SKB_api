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
  idAlumno:string ="";
  asignatura:string = "";
  fecha:string = "";
  comportamiento:string = "";
  actitud:string = "";
  hora:string = "";

  ngOnInit(): void{
    console.log(this.auth.email)
    this.api.init();
    this.api.getPartesCotutorias();
    
    console.log(this.api.cotutorias);
    console.log(this.mostrarAlumnos);
    console.log(this.mostrarForm);

  }

  logout(){
    this.auth.logout();
  }

  locationCotutorias(){
    this.auth.locationCotutorias();
  }

  accedeAlumno(cotutorias:any){
    this.nombre = cotutorias.idAlumno.nombre+" "+cotutorias.idAlumno.apellido1+" "+cotutorias.idAlumno.apellido2;
    this.idAlumno = cotutorias.idAlumno.id;
    this.cambiarVista();
  }

  cambiarVista(){
    if(this.mostrarAlumnos){
      this.mostrarAlumnos = false;
      this.mostrarForm = true;
    }else{
      this.mostrarAlumnos = true;
      this.mostrarForm = false;
    }
  }

  enviar(){
    console.log(this.actitud)
    this.api.createParte(this.idAlumno, '136', this.asignatura, this.fecha, this.hora, this.comportamiento, this.actitud)
    this.cambiarVista();
  }

}
