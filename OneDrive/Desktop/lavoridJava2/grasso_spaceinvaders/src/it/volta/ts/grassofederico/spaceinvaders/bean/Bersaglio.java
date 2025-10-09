package it.volta.ts.grassofederico.spaceinvaders.bean;

public class Bersaglio extends Thread{
	
	private int posizione;
	private double pausa;
	private int max;
	
	public Bersaglio(double pausa,int max) {
		this.pausa = pausa;
		this.max = max;
		posizione = 0;
	}

	public int getPosizione() {
		return posizione;
	}

	public void setPosizione(int posizione) {
		this.posizione = posizione;
	}

	public double getPausa() {
		return pausa;
	}

	public void setPausa(double pausa) {
		this.pausa = pausa;
	}
	
	public void run() {
		while(true) {
			for(int i = 0 ; i < max; i++) {
				try {
					Thread.currentThread().sleep((long)pausa);
				} catch (InterruptedException e) {
					e.printStackTrace();
				}
				posizione++;
			}
			for(int i = max; i > 0 ; i--) {
				try {
					Thread.currentThread().sleep((long)pausa);
				} catch (InterruptedException e) {
					e.printStackTrace();
				}
				posizione--;
			}
		}
		
	}
	
}
