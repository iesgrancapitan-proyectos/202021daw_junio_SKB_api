import { Component, OnInit } from '@angular/core';
import { ApiService } from '../api.service';
import { AuthService } from '../auth.service';

@Component({
  selector: 'app-cotutorias',
  templateUrl: './cotutorias.component.html',
  styleUrls: ['./cotutorias.component.css']
})
export class CotutoriasComponent implements OnInit {

  constructor(public api:ApiService, public auth:AuthService) { }

  mostrarCartas:boolean = false;
  mostrarAlumno:boolean = true;
  
  mostrarFormulario:boolean = true;
  mostrarPartes:boolean = true;
  fecha:string = "";
  nombre:string = "";

  ngOnInit(): void{
    this.api.getPartes();
  }

  logout(){
    this.auth.logout();
  }

  locationIndex(){
    this.auth.locationIndex();
  }

  accedeAlumno(alumno:any){
    this.mostrarCartas = true;
    this.mostrarAlumno = false;
    this.nombre = alumno.nombre+" "+alumno.apellido1+" "+alumno.apellido2;
    console.log(alumno);
  }

  buscarFecha(fecha:string){
    console.log(fecha);
    this.mostrarFormulario= true;
    this.mostrarPartes= false;
    console.log(this.api.cotutorias);
  }


}