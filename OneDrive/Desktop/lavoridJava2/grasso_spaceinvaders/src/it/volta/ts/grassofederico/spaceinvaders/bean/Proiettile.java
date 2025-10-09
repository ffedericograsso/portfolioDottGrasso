package it.volta.ts.grassofederico.spaceinvaders.bean;

public class Proiettile extends Thread {
	
	private int posizione;
	private double pausa;
	
	public Proiettile(double pausa,int posizione) {
		this.pausa = pausa;
		this.posizione = posizione;
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
		for( int i = posizione ; i > 0; i--) {
			try {
				Thread.currentThread().sleep((long)pausa);
			} catch (InterruptedException e) {
				e.printStackTrace();
			}
			posizione--;

		}
		
	}
	
}

	
