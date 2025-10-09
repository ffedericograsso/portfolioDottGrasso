package it.volta.ts.grassofederico.spaceinvaders.ui;

import java.awt.FlowLayout;
import java.awt.event.KeyEvent;
import java.awt.event.KeyListener;
import java.util.ArrayList;

import javax.swing.ImageIcon;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;

import it.volta.ts.grassofederico.spaceinvaders.bean.Bersaglio;
import it.volta.ts.grassofederico.spaceinvaders.bean.Proiettile;
import it.volta.ts.grassofederico.spaceinvaders.business.BizSpace;


public class MyFrame extends JFrame {
	
	private ArrayList<Immagine> i;
	private Proiettile p;
	private BizSpace bS;
	private Bersaglio b;
	private int xI,yI;
	
	public MyFrame() {
		super();
		setResizable(false);
		setTitle("SPACE INVADERS GRASSO");
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setSize(612,408);
		p = null;
		
		i = new ArrayList<Immagine>();
		
		xI = 150;
		yI = 240;
		
		i.add(new Immagine("pikachu.png",0,10,80,80));
		i.add(new Immagine("trainer.png",xI,yI,140,80));
		
		b = new Bersaglio(8,520);
	
		
		JLabel sfondo = new JLabel(new ImageIcon("route.png"));
		sfondo.setSize(612,408);
		setContentPane(sfondo);
		setLayout(new FlowLayout());
		

		
		this.addKeyListener(new KeyListener() {
			
			@Override
			public void keyPressed(KeyEvent e) {
				switch(e.getKeyCode()) {
					case KeyEvent.VK_LEFT:
						if(xI != 0)
							xI = xI - 5;
						i.get(1).setLocation(xI, yI);
						break;
					case KeyEvent.VK_RIGHT:
						if(xI != 520)
							xI = xI + 5;
						i.get(1).setLocation(xI, yI);
						break;
					case KeyEvent.VK_UP:
						if(bS.getP() == null) {
							i.add(new Immagine("pokeball.png",xI,yI-40,76,80));
							p = new Proiettile(3,yI-40);
							bS.setP(p);
							aggiungiImmagini();
							p.start();
						}
						break;
							
				}
				
			}

			@Override
			public void keyTyped(KeyEvent e) {
				// TODO Auto-generated method stub
				
			}

			@Override
			public void keyReleased(KeyEvent e) {
				// TODO Auto-generated method stub
				
			}

		}
		);
		
		bS = new BizSpace(i,b,p);
		aggiungiImmagini();
		b.start();
		bS.start();
		
		
		setLayout(null);
		setVisible(true);
		
		
	}
	
	
	public void aggiungiImmagini() {
		for(Immagine iS : i)
			this.add(iS);
		bS.setI(i);
		
	}
	
}
