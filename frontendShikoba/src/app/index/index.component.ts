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
  enviado:boolean = true;
  salir:boolean = true;
  incompleto:boolean = true;
  date = new Date();
  fecha = this.date.getFullYear()+"-"+this.anadirCero(this.date.getMonth()+1+"")+"-"+this.anadirCero(this.date.getDate()+"");

  nombre:string = "";
  idAlumno:string ="";
  asignatura:string = "";
  comportamiento:string = "";
  actitud:string = "";
  hora:string = "";

  busqueda:string = "";
  ngOnInit(): void{
    
    if(this.auth.cookies.get("relocate") == "unproper" && this.auth.cookies.get("location") != "index"){
      this.auth.relocate(this.auth.cookies.get("location"));
    }

    this.auth.cookies.delete("relocate");
    this.auth.cookies.set("location", "index")
    
    this.api.init();
    this.api.getPartesCotutorias();

  }

  logout(){
    this.auth.logout();
  }

  cancelar(){
    if(this.salir){
      this.salir = false
    }else{
      this.salir = true;
    }
  }


  accedeAlumno(busqueda:any){
    this.nombre = busqueda.nombre+" "+busqueda.apellido1+" "+busqueda.apellido2;
    this.idAlumno = busqueda.id;
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
    this.auth.cookies.set("relocate", "unproper")
  }

  enviar(){
    if(this.asignatura == "" || Number(this.hora) > 6 || Number(this.hora) < 1 ||  this.hora == "" || Number(this.comportamiento) > 5 || Number(this.comportamiento) < 1 || this.comportamiento == "" || Number(this.actitud) > 5 || Number(this.actitud) < 1 ||  this.actitud == ""){
      this.incompleto = false;
    }else{
      this.api.createIndicacion(this.idAlumno, this.api.usuario.id, this.asignatura, this.fecha, this.hora, this.comportamiento, this.actitud)
      this.enviado = false;
    }  
  }

  anadirCero(dia:string){
    if(Number(dia) < 10){
      dia = "0"+ dia;
    }
    return dia;
  }

  refresh(){
    window.location.reload();
  }


  buscar(busqueda:string){
    this.busqueda = busqueda;
    if(busqueda == ""){
      this.api.setBusqueda(this.api.cotutorias);
    }else{
      //let arrayBusqueda =
      let search = this.api.soloCotutorias(this.api.getBusqueda(this.busqueda, this.api.alumnos));
      if(search.length < 1){ 
        search = this.api.buscarCurso(this.busqueda, this.api.cotutorias);
      }
      this.api.setBusqueda(search);
    }
    
    //this.api.getAlumnos(modo);
  }
}
