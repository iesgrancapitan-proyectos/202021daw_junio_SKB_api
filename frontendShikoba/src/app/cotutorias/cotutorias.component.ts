import { stringify } from '@angular/compiler/src/util';
import { Component, OnInit } from '@angular/core';
import { ApiService } from '../api.service';
import { AuthService } from '../auth.service';


@Component({
  selector: 'app-cotutorias',
  templateUrl: './cotutorias.component.html',
  styleUrls: ['./cotutorias.component.css']
})
export class CotutoriasComponent implements OnInit {
  constructor(public api:ApiService, public auth:AuthService) {
  }

  
  viewDate:any = new Date();
  diaEnMiliSegundos:number = 1000 * 60 * 60 * 24;

  mostrarCartas:boolean = false;
  mostrarAlumno:boolean = true;
  salir:boolean = true;

  mostrarInformes:boolean = true;
  fecha:string = "";
  nombre:string = "";
  idAlumno:string = "";
  busqueda:string = "";
  diaEscogido:number = 0;

  fechaInicial:Date;
  fechaFinal:Date;
  fechaInicialCadena:string;
  fechaFinalCadena:string;
  

  alumno:any;

  ngOnInit(): void{

    if(this.auth.cookies.get("relocate") == "unproper" && this.auth.cookies.get("location") != "cotutorias"){
      this.auth.relocate(this.auth.cookies.get("location"));
    }
    this.auth.cookies.set("location", "cotutorias")
    this.auth.cookies.delete("relocate");
    
    
    //Generación de fechaInicial (lunes) y fechaFinal (viernes)
    this.fechaInicial = new Date(this.viewDate.getTime() - this.diaEnMiliSegundos*(this.viewDate.getDay()-1));
    this.fechaFinal = new Date(this.fechaInicial.getTime() + this.diaEnMiliSegundos*4);

    
    this.api.init();
    this.api.setBusqueda(this.api.alumnosCotSoloAlumnos)
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


  accedeAlumno(alumno:any){
    this.alumno = alumno;
    this.mostrarCartas = true;
    this.mostrarAlumno = false;
    this.nombre = alumno.nombre+" "+alumno.apellido1+" "+alumno.apellido2;
    this.idAlumno = alumno.id;
    this.actualizarFechasCadena();
    this.buscarFecha(this.fechaInicial);
    this.auth.cookies.set("relocate", "unproper")
  }
  
  anadirCero(dia:string){
    if(Number(dia) < 10){
      dia = "0"+ dia;
    }
    return dia;
  }
  
  cambiarDia(n:number){
    this.diaEscogido = n;
    this.buscarFecha(new Date(this.fechaInicial.getTime()+ this.diaEnMiliSegundos*n));
  }

  cambiarSemana(n:number){
    this.fechaInicial = new Date(this.fechaInicial.getTime()+(this.diaEnMiliSegundos*7)*n);
    this.fechaFinal = new Date(this.fechaFinal.getTime()+(this.diaEnMiliSegundos*7)*n);
    this.actualizarFechasCadena();
    this.buscarFecha(this.fechaInicial);
  }

  actualizarFechasCadena(){
    this.fechaInicialCadena = this.anadirCero(""+this.fechaInicial.getDate())+"/"+this.anadirCero(""+Number(this.fechaInicial.getMonth()+1))+"/"+this.fechaInicial.getFullYear();
    this.fechaFinalCadena = this.anadirCero(""+this.fechaFinal.getDate())+"/"+this.anadirCero(""+Number(this.fechaFinal.getMonth()+1))+"/"+this.fechaFinal.getFullYear();
  }

  buscarFecha(fecha:Date){
    this.api.getInformesDia(fecha.getFullYear()+"-"+Number(fecha.getMonth()+1)+"-"+fecha.getDate(), this.idAlumno);
  }

  refresh(){
    window.location.reload();
  }

  buscar(busqueda:string){
    this.busqueda = busqueda;
    if(busqueda == ""){
      this.api.setBusqueda(this.api.alumnosCotSoloAlumnos);
    }else{
      //let arrayBusqueda =
      let search = this.api.getBusqueda(this.busqueda, this.api.alumnosCotSoloAlumnos);
      if(search.length < 1){ 
        search = this.api.buscarCurso(this.busqueda, this.api.alumnosCotSoloAlumnos);
      }
      this.api.setBusqueda(search);
    }
    
    //this.api.getAlumnos(modo);
  }


}