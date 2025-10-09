package it.volta.ts.grassofederico.spaceinvaders.business;

import java.awt.Frame;
import java.util.ArrayList;

import javax.swing.JOptionPane;

import it.volta.ts.grassofederico.spaceinvaders.bean.Bersaglio;
import it.volta.ts.grassofederico.spaceinvaders.bean.Proiettile;
import it.volta.ts.grassofederico.spaceinvaders.ui.Immagine;

public class BizSpace extends Thread {
		
	private ArrayList<Immagine> i;
	private Bersaglio b;
	private Proiettile p;
	private boolean ok;
	
	public BizSpace(ArrayList<Immagine> i,Bersaglio b,Proiettile p) {
		this.i = i;
		this.b = b;
		this.p = p;
		ok = false;
	}
	
	
	
	public ArrayList<Immagine> getI() {
		return i;
	}



	public void setI(ArrayList<Immagine> i) {
		this.i = i;
	}

	public Proiettile getP() {
		return p;
	}



	public void setP(Proiettile p) {
		this.p = p;
	}
	

	public void run() {
		while(!ok) {
			i.get(0).setLocation(b.getPosizione(),i.get(0).getY());
			if(p != null) {
				i.get(2).setLocation(i.get(2).getX(),p.getPosizione());
				if(i.get(2).getY() == i.get(0).getY()) {
					if((i.get(2).getX() >= i.get(0).getX()) && (i.get(2).getX() <= (i.get(0).getX() + 30)) && (i.get(2).getY() <= (i.get(0).getY() + 30)) && (i.get(2).getY() >= i.get(0).getY())) {
						Frame f = new Frame();
						JOptionPane.showMessageDialog(f, "HAI CATTURATO PIKACHU", "VINCITORE", JOptionPane.WARNING_MESSAGE);;
						ok = true;
						break;
					}else {
						p = null;
						i.get(2).hide();
						i.remove(2);
					}
				}
			}
			
		}
	}
}
