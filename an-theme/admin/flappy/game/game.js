'use strict';
function initFlappy(path){
var poin, stage='start' ,countStart=0, countGame=0, 
kontrolPipa=1,
skor=0,
vY=0.4,
overCount,
wWorld=2.4, //Panjang area game
speed=200, //kecepatan game (pipa)
jarak=60, //Jarak antara pipa
jPipa=0,
cekOver
;
var game= {

	UpdatePipa: [],
	background: [],
	ground: [],
	piranhaAtas: [],
	piranhaBawah: [],

	setUp: function(){
		if(this.tersedia){
			this.bird.destroy();
			this.pipaAtas.destroy();
			this.pipaBawah.destroy();
			this.piranha.destroy();
			for(var a=0;a<=wWorld;a++){
			this.background[a].destroy();
			this.ground[a].destroy();
			}
			this.poin.destroy();
			this.getReadyText1.destroy();
			this.getReadyText2.destroy();
			this.instruction.destroy();
			this.tersedia=false;
			this.exek.detach();
			this.piranhaAtas=[];
			this.piranhaBawah=[];
		}


		if(this.selesaiText){
			this.selesaiText.destroy();
		}
		this.terbang=this.add.audio('terbang');
		this.skorMusik=this.add.audio('skor');
		this.tabrakPipa=this.add.audio('tabrakPipa');

		this.physics.startSystem(Phaser.Physics.ARCADE);


		for(var a=0;a<=wWorld;a++){
			this.background[a]=this.add.sprite(288*a,0,"background");
		}

		this.piranha=this.add.group();
		this.piranha.enableBody=true;
		
		this.pipaAtas=this.add.group();
		//this.pipaAtas.bringToTop(this.pipa);
		this.pipaBawah=this.add.group();
		//this.pipaBawah.bringToTop();
		this.pipaAtas.enableBody=true;
		this.pipaBawah.enableBody=true;

		for(var b=0;b<=wWorld;b++){
			this.ground[b]=this.add.tileSprite(288*b,this.world.height-112,335,112,'ground');			
			this.physics.arcade.enableBody(this.ground[b]);
			this.ground[b].autoScroll(-speed,0);
			this.ground[b].body.immovable=true;

		}

		this.bird=this.add.sprite(this.world.width/3,this.world.height/2,'bird');//muat gambar burung
		this.physics.arcade.enable(this.bird);
		this.bird.anchor.setTo(0.5);
		this.bird.collideWorldBounds =true;
		this.bird.animations.add('flap',[0,1,2], 10, true);//
		this.bird.animations.play('flap');

		/*
		this.piranha=this.add.sprite(10,10,'piranha');
		this.piranha.animations.add('makan',[0,1],5,true);
		this.piranha.animations.play('makan');
		*/




		this.poin=this.add.bitmapText(this.world.width/2,30,'font','0');
		this.poin.anchor.setTo(0.5);
		

		this.getReadyText1=this.add.bitmapText(this.world.width/2,179,'font','0');
		this.getReadyText1.anchor.setTo(0.5);
		this.getReadyText1.text="Tunjukan kesaktian mu"
		this.getReadyText2=this.add.bitmapText(this.world.width/2,220,'font','0');
		this.getReadyText2.anchor.setTo(0.5);
		this.getReadyText2.text="Buat papamu bangga"

		this.instruction=this.add.sprite(this.world.width/2,this.world.height-150,'instructions');
		this.instruction.anchor.setTo(0.5);
		this.kontrol=this.input.keyboard.addKey(Phaser.Keyboard.SPACEBAR);



		this.kontrol2=this.input.mouse.mouseDownCallback=function(){
			if(stage=='start'){
				game.getReadyText1.kill();
				game.getReadyText2.kill();
				game.instruction.kill();
				stage="game";
			} 

			game.terbang.play();
			game.bird.body.gravity.y=1200;
			game.bird.body.allowGravity = true;
			game.bird.body.velocity.y= -400;
			game.bird.game.add.tween(game.bird).to({angle: -40}, 100).start();
			if(stage=='over'){
				if(overCount == 3){
				game.selesaiText.text='Uda Selesai gan'
			 } else if(overCount==7){
			 	game.selesaiText.text="Stop tekan tekan ntar komputermu rusak"
			 } else if (overCount==10){
			 	game.selesaiText.text="Uda mati bego";
			 } else if (overCount==13){
			 	game.selesaiText.text="Tekan tombol yang dibawah";
			 }
				overCount++;
			}
		}

		

		
		this.exek=this.kontrol.onDown.add(function(){
			game.terbang.play();
			this.body.gravity.y=1200;
			this.body.allowGravity = true;
			this.body.velocity.y= -400;
			this.game.add.tween(this).to({angle: -40}, 100).start();
			if(stage=='over'){
				if(overCount == 3){
				game.selesaiText.text='Uda Selesai gan'
			 } else if(overCount==7){
			 	game.selesaiText.text="Stop tekan tekan ntar komputermu rusak"
			 } else if (overCount==10){
			 	game.selesaiText.text="Uda mati bego";
			 } else if(overCount==13){
			 	game.selesaiText.text="Tekan tombol yang dibawah";
			 }
				overCount++;
			}
			
		},this.bird);

			


		this.tersedia=true;
		stage="start";
		skor=0;
		cekOver=0;


	},

	preload: function(){
		this.load.image('background',path+'/assets/background.png');//gambar background
		this.load.image('ground',path+'/assets/ground.png');//gambar dasar		
		this.load.image('instructions',path+'/assets/instructions.png');//tulisan instruction
		this.load.image('tombol',path+'/assets/start-button.png');//tulisan instruction
		this.load.bitmapFont('font',path+'/assets/fonts/flappyfont/flappyfont.png',path+'/assets/fonts/flappyfont/flappyfont.fnt');


		this.load.spritesheet('bird',path+'/assets/bird.png',34,24,3,0);//burung
		this.load.spritesheet('pipes',path+'/assets/pipes.png', 54,320,2);
		this.load.spritesheet('piranha',path+'/assets/piranha.png', 24,33,2,0,1);//piranha

		this.load.audio('terbang',path+'/assets/flap.wav');
		this.load.audio('skor',path+'/assets/score.wav');
		this.load.audio('tabrakPipa',path+'/assets/ouch.wav');
	},

	create: function(){
		
		this.setUp();	
		

	},

	update: function(){
		  this.physics.arcade.collide(this.bird,this.ground,this.gameBerakhir,null,this);
		  this.physics.arcade.collide(this.bird,this.pipaAtas,this.gameBerakhir,null,this);
		  this.physics.arcade.collide(this.bird,this.pipaBawah,this.gameBerakhir,null,this);
		  this.physics.arcade.collide(this.bird,this.piranha,this.gameBerakhir,null,this);

			if(stage=='start'){

				if(countStart==20){
					vY*=-1;
					countStart=1;
				 }

				this.bird.body.position.y+=vY;


					countStart++;
				if(this.kontrol.isDown){
					this.getReadyText1.kill();
					this.getReadyText2.kill();
					this.instruction.kill();
					stage="game";

				}

			}else if(stage=='game'){
				this.bird.angle+=2;
				countGame++;
		      if(countGame==jarak){
		      	this.PosisiAcak=Math.random() * (290 - 120) + 120;
		        kontrolPipa++;
		        this.UpdatePipa[kontrolPipa]=new this.pipaBaru(this.PosisiAcak);
		        this.UpdatePipa[kontrolPipa].cek=function(){
		        if(this.pipa[this.posisiPipa1].position.x > game.bird.position.x-5 && this.pipa[this.posisiPipa1].position.x < game.bird.position.x+5 && this.lewat==false){
		        		skor++;
		        		game.poin.text=skor;
		        		this.lewat=true;
		        		game.skorMusik.play();
		        	}

		        if(this.pipa[this.posisiPipa1].position.x < 0){
		        	this.pipa[this.posisiPipa1].destroy();
		        	this.pipa[this.posisiPipa2].destroy();
		        }

		        }


		        this.piranhaBaru(this.PosisiAcak,kontrolPipa);

		      	countGame=0;
		      }

		      if(kontrolPipa>1){
		      for(var i=2;i<=kontrolPipa;i++){
		      	this.UpdatePipa[i].cek();
		      	if(this.piranhaAtas[i]){
		      	this.piranhaAtas[i].ilangMuncul();
		    	  }
		    	  if(this.piranhaBawah[i]){
			      	this.piranhaBawah[i].ilangMuncul();
			      }
		      }

		   
		      
		 	 }
  

 			if(this.bird.body.position.y<=0){
		 	 	this.gameBerakhir();

		 	 }


			} else if(stage=='over' && cekOver==0){
				//this.terbang.destroy();
				//this.skorMusik.destroy();
				//this.tabrakPipa.destroy();
				this.selesaiText=this.add.bitmapText(this.world.width/2,150,'font','0');
				this.selesaiText.anchor.setTo(0.5);
				this.selesaiText.text="Kelar hidup loe"

				cekOver=1;
				this.tombolStart=this.add.button(this.world.width/2,this.world.height/2,'tombol',function(){
					game.setUp();
					this.destroy();
				});
				this.tombolStart.anchor.setTo(0.5)

			}
		},

	piranhaBaru: function(posisi,index){
		this.piranhaAtas[index]=game.piranha.create(this.world.width+5,posisi-80,'piranha');
		this.piranhaAtas[index].anchor.setTo(0.5);
		this.piranhaAtas[index].angle=180;
		this.piranhaAtas[index].animations.add('makan',[0,1],5,true);		
		this.piranhaAtas[index].animations.play('makan');
		this.piranhaAtas[index].body.velocity.x=-200;
		this.piranhaAtas[index].hitung=0;
		this.piranhaAtas[index].vY=0.5;
		this.piranhaAtas[index].body.immovable=true;
		this.piranhaAtas[index].ilangMuncul=function(){
			if(this.hitung==60){
			this.vY*=-1;
			this.hitung=0;
			}
			this.body.position.y+=this.vY;
			this.hitung++
		}

		this.piranhaBawah[index]=game.piranha.create(this.world.width+5,posisi+35,'piranha');
		this.piranhaBawah[index].anchor.setTo(0.5,0);
		this.piranhaBawah[index].animations.add('makan',[0,1],5,true);		
		this.piranhaBawah[index].animations.play('makan');
		this.piranhaBawah[index].body.velocity.x=-200;
		this.piranhaBawah[index].hitung=0;
		this.piranhaBawah[index].vY=0.5;
		this.piranhaBawah[index].body.immovable=true;
		this.piranhaBawah[index].ilangMuncul=function(){
			if(this.hitung==60){
			this.vY*=-1;
			this.hitung=0;
			}
			this.body.position.y+=this.vY;
			this.hitung++
		}

		   


	},

	pipaBaru: function(posisi){
		this.pipa=[];
		this.posisiPipa1=jPipa;
		this.pipa[this.posisiPipa1]=game.pipaAtas.create(game.world.width+30,posisi-65,'pipes',0);
		this.pipa[this.posisiPipa1].anchor.setTo(1);
		this.pipa[this.posisiPipa1].body.velocity.x=-speed;
		this.pipa[this.posisiPipa1].body.immovable=true;
		this.lewat=false;

		jPipa++;
		this.posisiPipa2=jPipa;
		this.pipa[this.posisiPipa2]=game.pipaBawah.create(game.world.width-25 ,posisi+65,'pipes',1);
		this.pipa[this.posisiPipa2].body.velocity.x=-speed;
		this.pipa[this.posisiPipa2].body.immovable=true;

		jPipa++;

	},

	gameBerakhir: function(){
		this.tabrakPipa.play();
		//this.poin.text="Game Over";
		stage="over";
		overCount=1;
		this.bird.kill()
		
	},

		
}


var Game = new Phaser.Game(288*wWorld,505,Phaser.CANVAS,"flappy-bird-reborn");
Game.state.add('game',game);
Game.state.start('game');

}