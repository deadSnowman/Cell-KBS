#!/usr/bin/env ruby
# Aenigma's haml Rake file
# https://github.com/Aenigma

require 'haml'

OUTPUT_DIR = "build"
task :default => [:clean,:make]
task :make => [OUTPUT_DIR,:convert_haml]
task :update => [:make,:upload_upstream]

task :convert_haml do
	FileList['./haml/*.haml'].each do |fin|
		destination = OUTPUT_DIR + '/' + File.basename(fin).gsub(/\.haml$/, '.html')
		File.open destination, "w" do |fout|
			fout << Haml::Engine.new(File.read(fin)).render
		end
	end
end

task :clean do
	rm_rf OUTPUT_DIR
end

file OUTPUT_DIR do
	directory OUTPUT_DIR
	Dir["public"].each do |f|
		cp_r f, OUTPUT_DIR
	end
end
